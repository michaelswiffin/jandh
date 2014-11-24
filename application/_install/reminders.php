<h1>Reminders.....</h1>
<h2>MVC</h2>
<pre>
1/ M
Create a model.....
---------------------------------------------------------||

class PageModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function getAllPages()
    {
        $sql = "SELECT * FROM pages";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

2/ V
Create a VIEW
---------------------------------------------------------||
Make a folder in the VIEWS folder
In that - make an index.php
...and then any other required php files for each view
eg: 
	Shop front
	Shop category
	Shop Product
	Shop Cart
	

 
3/ C
create a controller
---------------------------------------------------------||
	class ControllerName extends Controller
	
	every controller needs an index() function as default
	

</pre>