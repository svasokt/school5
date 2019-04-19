<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/19/19
 * Time: 09:37
 */

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Singleton/Singletone.php";

class Categories
{
    /**
     * @var null|PDO
     */
    private $_db = null;

    /**
     * @var array
     */
    private $categoryList = [];

    /**
     * Categories constructor.
     */
    public function __construct()
    {
        $this->_db = Singletone::getConnection();
    }

    /**
     * @return array
     */
    public function getAllCategories()
    {
        $result = $this->_db->query('SELECT id, name FROM category ORDER BY sort_order ASC;');
        $i = 0;

        while ($row=$result->fetch())
        {
            $this->categoryList[$i]['id'] = $row['id'];
            $this->categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $this->categoryList;
    }
}