<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class PostModel extends Database
{
    public function isVisited($token)
    {
        $this->query("SELECT 1 FROM visitors WHERE visitor_token = ? LIMIT 1");
        $this->bindValue(1, $token);
        $this->execute();
        return $this->rowCount() > 0;
    }
    public function store(array $data): void
    {
        $this->query("
            INSERT INTO posts (
                user_id,
                title,
                image1,
                paragraph1,
                image2,
                paragraph2,
                created_at
            ) VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");

        $this->bindValue(1, $data['user_id']);
        $this->bindValue(2, $data['title']);
        $this->bindValue(3, $data['image1']);
        $this->bindValue(4, $data['paragraph1']);
        $this->bindValue(5, $data['image2']);
        $this->bindValue(6, $data['paragraph2']);

        $this->execute();
    }
    public function paginate(int $page = 1, int $perPage = 10): array
    {
        $offset = ($page - 1) * $perPage;

        $this->query("
            SELECT
                p.id,
                p.title,
                p.image1,
                p.paragraph1,
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

    public function visitors()
    {
        $this->query("SELECT COUNT(*) as total FROM visitors");
        return (int) $this->single()['total'];
    }

    public function update(int $id, array $data): void
    {
        $this->query("
        UPDATE posts SET
            title = ?,
            image1 = ?,
            paragraph1 = ?,
            image2 = ?,
            paragraph2 = ?
        WHERE id = ?
    ");

        $this->bindValue(1, $data['title']);
        $this->bindValue(2, $data['image1']);
        $this->bindValue(3, $data['paragraph1']);
        $this->bindValue(4, $data['image2']);
        $this->bindValue(5, $data['paragraph2']);
        $this->bindValue(6, $id);

        $this->execute();
    }
    public function findById(int $id): ?array
    {
        $this->query("
        SELECT
            p.id,
            p.title,
            p.image1,
            p.paragraph1,
            p.image2,
            p.paragraph2,
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

    public function delete(int $id): void
    {
        $this->query("DELETE FROM posts WHERE id = ?");
        $this->bindValue(1, $id);
        $this->execute();
    }
}
