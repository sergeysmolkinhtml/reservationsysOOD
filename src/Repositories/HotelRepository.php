<?php

namespace App\Repositories;

use App\Modules\MySQLDatabase;
use App\Entities\Hotel;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Aura\SqlQuery\QueryFactory;
use PDO;

final class HotelRepository implements HotelRepositoryInterface
{
    private QueryFactory $queryFactory;
    private PDO $pdo;

    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = MySQLDatabase::getInstance();
    }

    /**
     * @param string[] $columns
     * @return array
     */
    public function all(array $columns = array('*')) : array
    {
        $select = $this->queryFactory->newSelect();
        $select->cols($columns)->from(Hotel::getUserTable());

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @param array $columns
     * @return array
     */
    public function find($id, array $columns = ['*']) : array
    {
        // TODO: Implement find() method.
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @param $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input)
    {
        // TODO: Implement update() method.
    }

    public function getReviews()
    {
        return 10;
    }
}