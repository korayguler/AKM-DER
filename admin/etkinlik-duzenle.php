<?php
include 'settings/connect_db.php';
include 'header.php';
include 'sidebar.php'; 

$getid=$_GET["event_id"];

$result=$conn->query("select * from events where id=$getid");
$row=$result->fetch_assoc();
if (!isset($_SESSION['admin_logged'])) {
    header('Location:login.php');
  }
  
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
        <div class="col-md-12">
                     <h2>Etkinlik Düzenle</h2>   
                        
                       <?php
                      $durum=isset($_GET["durum"]);

                       if($durum=="ok"){

                       ?>
                       <h5>İşlem Başarılı...</h5>
                    <?php }elseif($durum=="error"){  ?>
                        <h5>Hatalı İşlem!! </h5>
                    <?php }else{ ?>

                        <h5>Buradan Etkinliklerinizi düzenleyebilirsiniz. </h5>

                    <?php } ?>
                    </div>
        </div>

        <hr />


        <div class="panel panel-default ">
            <div class="panel-heading ">Etkinlik Düzenleyin</div>
            <div class="panel-body ">
           
                <form method="post" action="settings/islem.php" enctype="multipart/form-data" class="form-horizonal row-border">
                <label></label>
                    <div class="form-group col-md-7 ">
                        <label>Etkinlik Başlık</label>
                        <input type="hidden" name="id"  value="<?php echo $row["id"] ?>">
                        <input type="text" value="<?php echo $row["title"] ?>" class="form-control" name="title" placeholder="Etkinlik için başlığı giriniz">
                    </div>

                    <div class="form-group col-md-7 ">
                        <label>Etkinlik Başlık : İngilizce</label>
                        <input type="text"  value="<?php echo $row["title_en"] ?>"  class="form-control" name="title_en" placeholder="Etkinlik için başlığı giriniz (EN)" >
                    </div>

                    <div class="form-group col-md-7">
                        <label>Etkinlik Açıklama</label>
                        <input type="text"  value="<?php echo $row["description"] ?>" class="form-control" name="description" placeholder="Etkinlik açıklamasını giriniz">
                    </div>

                    <div class="form-group col-md-7">
                        <label>Etkinlik Açıklama : İngilizce</label>
                        <input type="text"  value="<?php echo $row["description_en"] ?>" class="form-control" name="description_en" placeholder="Etkinlik açıklamasını giriniz (EN)">
                    </div>

                    <div class="form-group col-md-7">
                        <label>Etkinlik Tarihi</label>
                        <input type="date"  value="<?php echo $row["date"] ?>" class="form-control" name="date" >
                    </div>



                        <div class="form-group col-md-7">
                            <label>Dosyayı Seç  (Önerilen Boyut : 1:1)</label>
                            <input name="img"  type="file"  accept=".png,.jpg">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-success form-control col-sm" name="event_update">Etkinliği Güncelle </button>
                    </div>
<br><br>
                    
                </form>
            </div>
        </div>

    </div>

</div>
<?php include 'footer.php'; ?>