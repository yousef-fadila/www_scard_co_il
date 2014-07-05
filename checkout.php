<?php
require('config/config.php');

try{
    $db = new PDO('mysql:host=' . DB_HOST .'; dbname=' . DB_NAME, DB_USER, DB_PASS);
}catch(PDOExecption $e){
    die('Connection error: ' . $e->getMessage());
}


if(isset($_POST['phone']) === false && isset($_POST['pages-submit']) === false){
    header('Location: book.php');
    exit;
}

if(isset($_POST['pages-submit'])){
    
    $page1 = implode(' ' , $_POST['home_buttons']);
    unset($_POST['home_buttons']);
    
    $i = 0;
    $page = 2;
    $page2 = ''; $page3=''; $page4=''; $page5='';
    foreach($_POST as $post){
        $cur = 'page' . $page;
        switch($post){
            case 'map':
                $$cur = 'location----' . $_POST['location'];
                $page++;
                break;
            case 'custome':
                $$cur = 'custome----' . $_POST['c-title'][$i] . '----' . $_POST['c-content'][$i];
                $i++;
                $page++;
                break;
            case 'updates':
                $$cur = 'updates----' . $_POST['twitter'];
                $page++;
                break;
            case 'facebook':
                $$cur = 'facebook----' . $_POST['facebook'];
                $page++;
                break;
            case 'share':
                $$cur = 'share';
                $page++;
                break;
            case 'about':
                $$cur = 'about----' . $_POST['about'];
                $page++;
                break;
            default:
        }
    }
    
    $last_id = $_POST['last-id'];
     
    $query = "UPDATE customers
              SET `page1`=? , `page2`=? , `page3`=? , `page4`=? , `page5`=? , `notes`=?
              WHERE `id`=$last_id";
    
    $stmt = $db->prepare($query);
    if($stmt === false){
        die();
    }
    $notes = $_POST['notes'];
    //~ $stmt->bind_param();
    $finish = $stmt->execute(array($page1, $page2, $page3, $page4, $page5, $notes));
    //~ $stmt->close();
    //~ $db->close();
    $stmt = null;
    $db = null;
    
}else{

     
$query = "INSERT INTO customers
         (name , phone , email , background , title , color , image , status)
         VALUES (?,?,?,?,?,?,?,?)";
        
$stmt = $db->prepare($query);
       
$status = "new";
//$stmt->bind_param("ssssssss",
 
$params = array(
          $_POST['name'],
          $_POST['phone'],
          $_POST['email'],
          $_POST['bg-img'],
          $_POST['title-text'],
          $_POST['title-color'],
          $_POST['face-img'],
          $status);
    
$OK = $stmt->execute($params);
$id = $db->lastInsertId();
        
//~ $stmt->close();
        
//~ $db->close();
$stmt = null;
$db = null;
}
require('header.php'); 
?>

<script src="javascripts/pages.js"></script>
<link rel="stylesheet" href="stylesheets/pages.css">

<section class="container">
    
<?php
if($OK) { ?>
    <form id="customize" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <span class="label">נא לבחור את הכפתורים שברצונך שיופיעו בדף הבית:</span><br/>
        <input type="checkbox" name="home_buttons[]" value="call"> כפתור "התקשר" <br/>
        <input type="checkbox" name="home_buttons[]" value="email"> כפתור "דוא"ל" <br/>
        <input type="checkbox" name="home_buttons[]" value="sms"> כפתר "SMS" <br/>
        <input type="checkbox" name="home_buttons[]" value="facebook"> Facebook <br/>
        <input class="lastcb" type="checkbox" name="home_buttons[]" value="twitter"> Twitter <br/>
            
        <span class="label">נא לבחור מה ברצונך שיופיע בדף השני:</span><br/>
        <select name="second-page">
            <option value="">נא לבחור תוכן</option>
            <option value="map">מפה - עם ניווט ליעד דרך וויז</option>
            <option value="custome">תוכן מותאם אישית</option>
            <option value="updates">דף עדכונים - חדשות - מבצעים וכו'</option>
            <option value="facebook">facebook</option>
            <option value="share">דף שיתוף - דף המאפשר שיתוף אפליקציה בין חברים</option>
            <option value="about">דף אודות</option>
        </select><div class="popup"></div><br/>
            
        <input type="hidden" name="cord" id="cord" />
            
        <span class="label">נא לבחור מה ברצונך שיופיע בדף השלישי:</span><br/>
        <select name="third-page">
            <option value="">נא לבחור תוכן</option>
            <option value="map">מפה - עם ניווט ליעד דרך וויז</option>
            <option value="custome">תוכן מותאם אישית</option>
            <option value="updates">דף עדכונים - חדשות - מבצעים וכו'</option>
            <option value="facebook">facebook</option>
            <option value="share">דף שיתוף - דף המאפשר שיתוף אפליקציה בין חברים</option>
            <option value="about">דף אודות</option>
        </select><div class="popup"></div><br/>
            
        <span class="label">נא לבחור מה ברצונך שיופיע בדף הרביעי:</span><br/>
        <select name="forth-page">
            <option value="">נא לבחור תוכן</option>
            <option value="map">מפה - עם ניווט ליעד דרך וויז</option>
            <option value="custome">תוכן מותאם אישית</option>
            <option value="updates">דף עדכונים - חדשות - מבצעים וכו'</option>
            <option value="facebook">facebook</option>
            <option value="share">דף שיתוף - דף המאפשר שיתוף אפליקציה בין חברים</option>
            <option value="about">דף אודות</option>
        </select><div class="popup"></div><br/>
            
        <span class="label">נא לבחור מה ברצונך שיופיע בדף החמישי:</span><br/>
        <select name="fifth-page">
            <option value="">נא לבחור תוכן</option>
            <option value="map">מפה - עם ניווט ליעד דרך וויז</option>
            <option value="custome">תוכן מותאם אישית</option>
            <option value="updates">דף עדכונים - חדשות - מבצעים וכו'</option>
            <option value="facebook">facebook</option>
            <option value="share">דף שיתוף - דף המאפשר שיתוף אפליקציה בין חברים</option>
            <option value="about">דף אודות</option>
        </select><div class="popup"></div><br/>
            
        <span class="label">דרישות אחרות</span><br/>
        <textarea name="notes"></textarea><br/>
        
        <input type="hidden" name="last-id" value="<?php echo $id ?>"/>
        <input type="submit" name="pages-submit" value="submit" />
    </form>
      
<?php }elseif ($finish){
    echo '<p>
     תודה רבה שבחרת בנו , הזמנתך נקלטה בהצלחה , 
        <a href="index.php">
            לחץ כאן לחזרה לדף הבית
            </a>
     </p>';
}else{
    echo '<p> <a href="book.php"> אירעה שגיאה זמן קליטת הנתונים , סליחה על אי הניעמות , נא </a>נסה שנית.</p>';
}
?>
</section>
<?php require('footer.php'); ?>
