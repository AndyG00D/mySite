<?php


class UsersModel
{
    private $users = array(
        array(
            'id' => 1,
            'first_name' => 'Mark',
            'last_name' => 'Dwan',
            'mail' => 'mark@gmail.com',
            'age' => 24,
            'gender' => 'm'
        ),
        array(
            'id' => 2,
            'first_name' => 'Katty',
            'last_name' => 'Mao',
            'mail' => 'katty19@gmail.com',
            'age' => 19,
            'gender' => 'f'
        ),
        array(
            'id' => 3,
            'first_name' => 'Tommy',
            'last_name' => 'Chan',
            'mail' => 'tom_chan@gmail.com',
            'age' => 34,
            'gender' => 'm'
        ),
        array(
            'id' => 4,
            'first_name' => 'Liza',
            'last_name' => 'Simpson',
            'mail' => 'liza@gmail.com',
            'age' => 14,
            'gender' => 'f'
        ),
        array(
            'id' => 5,
            'first_name' => 'Gomer',
            'last_name' => 'Simpson',
            'mail' => 'gommy_sim@gmail.com',
            'age' => 50,
            'gender' => 'm'
        )
    );

    //настройки фильтра
    public $filter = array(
        'age' => array(
            'direction' => 'more',
            'val' => 5
                    ),
        'gender' => 'm',
        'sort' => 'asc'
    );


    public function getUserList($filter = false)
    {
        if (!$filter) {          // если объекта нет не производить фильтрацию
            return $this->users;
        }

        
            $res = array();

            //фильтрация
            foreach ($this->users as $user) {

                $filtering = false; //внутрення переменая. фильтровать или нет элемент

                if (!array_key_exists('gender', $filter) || $user['gender'] === $filter['gender']) { //проверка пола
                    $filtering = true;

                    if (array_key_exists('age', $filter)){                                //проверка возраста

                        switch ($filter['age']['direction']) {
                            case 'more':
                                $filtering = $user['age'] > $filter['age']['val'];
                                break;
                            case 'less':
                                $filtering = $user['age'] < $filter['age']['val'];
                                break;
                            case 'equal':
                                $filtering = $user['age'] == $filter['age']['val'];
                                break;
                            case 'equal_or_less':
                                $filtering = $user['age'] <= $filter['age']['val'];
                                break;
                            case 'equal_or_more':
                                $filtering = $user['age'] >= $filter['age']['val'];
                                break;
                            case '':
                                $filtering = true;
                                break;
                        }
                    }
                }
                if ($filtering){
                   $res[] = $user;
                }

            }

            //сортировка
            if($filter['sort'] != '')
            {
                usort($res, $this->build_sorter('last_name', $filter['sort']));
            }
            return $res;
        

    }

    //функция для проверки при сортировке
    private function build_sorter($key, $short) {
        return function ($a, $b) use ($key, $short) {
            if ($short == 'asc') {
                return strnatcmp($a[$key], $b[$key]);
            } elseif ($short == 'desc'){
                return strnatcmp($b[$key], $a[$key]);
            }

        };
    }

    private function getUserById($userId) {
        $res = array();

        foreach ($this->users as $user) {
            if ($user['id'] === $userId) {
                $res = $user;
                break;
            }
        }

        return $res;
    }


    public function getUserAge($userId) {
        $user = $this->getUserById($userId);

        return array_key_exists('age', $user) ? $user['age'] : null;
    }
}