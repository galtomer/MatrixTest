<?php
/**
 * Created by PhpStorm.
 * User: Tomer
 * Date: 29/10/16
 * Time: 21:43
 */

namespace Model;


use Exception;
use PDO;
use PDOException;

class Db
{

    /**
     * singleton instance
     *
     * @var Db
     */
    protected static $_instance = null;

    /**
     * Returns singleton instance of PDOConnection
     *
     * @return Db
     */
    public static function instance() {

        if ( !isset( self::$_instance ) ) {

            self::$_instance = new Db();

        }

        return self::$_instance;
    }

    /**
     * Hide constructor, protected so only subclasses and self can use
     */
    protected function __construct() {}

    function __destruct(){}

    /**
     * Return a PDO connection using the dsn and credentials provided
     *
     * @param string $dsn The DSN to the database
     * @param string $username Database username
     * @param string $password Database password
     * @return PDO connection to the database
     * @throws PDOException
     * @throws Exception
     */
    public function getConnection($dsn, $username, $password) {

        $conn = null;
        try {

            $conn = new \PDO($dsn, $username, $password);

            //Set common attributes
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {
            throw $e;
        }
        catch(Exception $e) {
            throw $e;
        }
    }
}