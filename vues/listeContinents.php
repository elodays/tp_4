<div class="container mt-5 ">
    <div class="row pt-5">
      <div class="col-9" ><h2> Liste des continents</h2></div>
      <div class= "col-3 "><a href="index.php?uc=continents&action=add" class='btn btn-success'><i class="lni lni-plus"></i>
 créer un continent</a></div>
 <table class="table  table-hover table-primary table-stiped">
  <thead>
    <tr >
      <th scope="col" class="col-md-2">numero</th>
      <th scope="col"class="col-md-8">Libellé</th>
      <th scope="col"class="col-md-2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($lesContinents as $continent){
echo "<tr>";
echo "<td class='col-md-2'>".$continent->getNum()."</td>";
echo "<td class='col-md-8'>".$continent->getLibelle()."</td>";
echo "<td class='col-md-2'>
 <a href='index.php?uc=continents&action=update&num=".$continent->getNum()."' class ='btn btn-primary'><i class ='lni lni-pencil-1'></i></a>
<a href='#modalSuppression' data-target='#modalSuppression' data-toggle='modal' data-message='voulez vous supprimer cette nationaliter ?'
 data-suppression='index.php?uc=continents&action=delete&num=".$continent->getNum()."' class='btn btn-danger'><i class='lni lni-trash-3'></i>
 </a>
</td>";
echo "</tr>";

    }
    ?>
  </tbody>
</table>
  </div>