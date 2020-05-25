<form action="/meresek/<?=$regiokId?>" method="POST">
    <select name="regiokId" id="">
        <?php foreach($costs as $cost): ?>
            <option value="<?=$cost['id']?>"><?=$cost['megnevezes']?></option>
        <?php endforeach ?>
    </select>
    <input type="submit" value="Szűkít">
</form>
<table class="table">
    <tr>
        <th>Mérés azonosító</th>
        <th>Év</th>
        <th>Hónap</th>
        <th>RégióId</th>
        <th>Perc</th>
    </tr>    
    <?php foreach($meresek as $meresek): ?>
        <tr>
            <td><?= $meresek["id"] ?></td>

            <td><?= $meresek["ev"] ?></td>           
            <td><?= $meresek["ho"] ?></td> 
            <td><?= $meresek["regioId"] ?></td> 
            <td><?= $meresek["perc"] ?></td> 
        </tr>        
    <?php endforeach ?>
</table>