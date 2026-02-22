<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class PostModel extends Database
{
    public function store(array $data): void
    {
        $this->query("
            INSERT INTO posts (
                user_id,
                title,
                thumbnail,
                category,
                paragraph,
                created_at
            ) VALUES (?, ?, ?, ?, ?, NOW())
        ");

        $this->bindValue(1, $data['user_id']);
        $this->bindValue(2, $data['title']);
        $this->bindValue(3, $data['thumbnail']);
        $this->bindValue(4, $data['category']);
        $this->bindValue(5, $data['paragraph']);

        $this->execute();
    }

    public function paginate(int $page = 1, int $perPage = 10): array
    {
        $offset = ($page - 1) * $perPage;

        $this->query("
            SELECT
                p.id,
                p.title,
                p.thumbnail,
                p.category,
                p.paragraph,
                p.created_at,
                u.username AS creator
            FROM posts p
            JOIN users u ON u.id = p.user_id
            ORDER BY p.created_at DESC
            LIMIT :limit OFFSET :offset
        ");

        $this->bindValue(':limit', $perPage);
        $this->bindValue(':offset', $offset);

        $data = $this->resultSet();

        $this->query("SELECT COUNT(*) AS total FROM posts");
        $total = (int) $this->single()['total'];

        return [
            'data' => $data,
            'pagination' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'last_page' => (int) ceil($total / $perPage),
            ]
        ];
    }

    public function findById(int $id): ?array
    {
        $this->query("
            SELECT
                p.id,
                p.title,
                p.thumbnail,
                p.category,
                p.paragraph,
                p.created_at,
                u.username AS creator
            FROM posts p
            JOIN users u ON u.id = p.user_id
            WHERE p.id = ?
            LIMIT 1
        ");

        $this->bindValue(1, $id);

        $result = $this->single();
        return $result ?: null;
    }

    public function update(int $id, array $data): void
    {
        $this->query("
            UPDATE posts SET
                title = ?,
                thumbnail = ?,
                category = ?,
                paragraph = ?
            WHERE id = ?
        ");

        $this->bindValue(1, $data['title']);
        $this->bindValue(2, $data['thumbnail']);
        $this->bindValue(3, $data['category']);
        $this->bindValue(4, $data['paragraph']);
        $this->bindValue(5, $id);

        $this->execute();
    }

    public function delete(int $id): void
    {
        $this->query("DELETE FROM posts WHERE id = ?");
        $this->bindValue(1, $id);
        $this->execute();
    }
    public function getDistinctCategories(): array
    {
        $this->query("
        SELECT DISTINCT category
        FROM posts
        ORDER BY category ASC
    ");

        return $this->resultSet();
    }
}
