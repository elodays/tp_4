<div class="container mt-5 ">
    <div class="row pt-5">
      <div class="col-9" ><h2> Liste des contients</h2></div>
      <div class= "col-3 "><a href="formAjoutNationaliter.php"action=ajouter class= 'btn btn-success'><i class="lni lni-plus"></i>
 créer un contient</a></div>
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
    foreach ($lescontients as $contient){
echo "<tr>";
echo "<td class='col-md-2'>$contient->getNum()</td>";
echo "<td class='col-md-5'>$contient->getLibelle()</td>";
echo "<td class='col-md-2'>
 <a href='formNationalitercopy.php?action=Modifier&num=$nationalite->getNum' class ='btn btn-primary'><i class ='lni lni-pencil-1'></i></a>
<a href='#modalSuppression' data-target='#modalSuppression' data-toggle='modal' data-message='voulez vous supprimer cette nationaliter ?'
 data-suppression='supprimeNationaliter.php?num=".$contient->getNum."' class='btn btn-danger'><i class='lni lni-trash-3'></i>
 </a>
</td>";
echo "</tr>";

    }
    ?>
  </tbody>
</table>
  </div>