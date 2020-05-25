<h2>Új régió felvétele</h2>
<form action="/newregion" method="POST" class="form">
<div>
        <label for="">Régiók</label>
        <select name="regioId" id="">
        <?php foreach($meresekDatas as $meresek): ?>
            <option value="<?=$meresek['id']?>"><?= $meresek['id'] ?></option>
        <?php endforeach ?>
        </select>
    </div>
    <br>
    <input type="submit" value="Rögzít" class="btn btn-grn">
</form>