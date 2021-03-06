<?php
include 'settings/connect_db.php';
include 'header.php';
include 'sidebar.php'; 

if (!isset($_SESSION['admin_logged'])) {
    header('Location:login.php');
  }
$id=$_GET["slider_id"];
$sql="select * from slider where slider_id=$id ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
        <div class="col-md-12">
                     <h2>Slider Ekle</h2>   
                        
                       <?php
                      $durum=isset($_GET["durum"]);

                       if($durum=="ok"){

                       ?>
                       <h5>İşlem Başarılı...</h5>
                    <?php }elseif($durum=="error"){  ?>
                        <h5>Hatalı İşlem!! </h5>
                    <?php }else{ ?>

                        <h5>Buradan slider ekleyebilirsiniz. </h5>

                    <?php } ?>
                    </div>
        </div>

        <hr />


        <div class="panel panel-default ">
            <div class="panel-heading ">Slider Ekleyin</div>
            <div class="panel-body ">
           
                <form method="post" action="settings/islem.php" enctype="multipart/form-data" class="form-horizonal row-border">
                <label></label>
                    <div class="form-group col-md-7 ">
                        <label>Slider Başlık</label>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="text"  value="<?php echo $row["slider_title"] ?>" class="form-control" name="slider_title" placeholder="Slider için başlığı giriniz">
                    </div>

                    <div class="form-group col-md-7 ">
                        <label>Slider Başlık : İngilizce</label>
                        <input type="text" value="<?php echo $row["slider_title_en"] ?>" class="form-control" name="slider_title_en" placeholder="Slider için başlığı giriniz">
                    </div>

                    <div class="form-group col-md-7">
                        <label>Slider Açıklama</label>
                        <input type="text" value="<?php echo $row["slider_description"] ?>" class="form-control" name="slider_description" placeholder="Slider açıklamasını giriniz">
                    </div>

                    <div class="form-group col-md-7">
                        <label>Slider Açıklama : İngilizce</label>
                        <input type="text" value="<?php echo $row["slider_description_en"] ?>" class="form-control" name="slider_description_en" placeholder="Slider açıklamasını giriniz">
                    </div>

                    <div class="form-group col-md-7">
                        <label>Slider Url</label>
                        <input type="text" value="<?php echo $row["slider_link"] ?>" class="form-control" name="slider_link" placeholder="URL | Bu kısmı boş bıraktığınız taktirde yukarıdaki componentler ekranda gözükmez">
                    </div>

                    <div class="form-group col-md-7 ">
                        <label>Slider Sıra</label>
                        <input type="number"  value="<?php echo $row["slider_sq"] ?>" class="form-control" name="slider_sq" placeholder="Slider sırasını giriniz">
                    </div>


                   

                        <div class="form-group col-md-7">
                            <label>Dosyayı Seç  (Önerilen Boyut : 16/9, 1920x1080, 1280x720 PX)</label>
                            <input name="slider_img" type="file"  accept=".png,.jpg">
                            <small class="text-primary">Yeni görsel seçtiğinizde sistemden eskisi ile değiştirilir!!</small>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-success form-control  col-sm" name="slider_edit">Slider Güncelle </button>
                    </div>
<br><br>
                    
                </form>
            </div>
        </div>

    </div>

</div>
<?php include 'footer.php'; ?>