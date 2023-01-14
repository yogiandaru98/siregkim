<form action="/create/akun" method="POST">
    <input type="text" name="nama" placeholder="nama">
    <p><?= $validation->getError('nama')  ?></p>
    <br>
    <input type="number" name="username" placeholder="username">
    <p><?= $validation->getError('username')  ?></p>
    <br>
    <input type="password" name="password" placeholder="password">
    <p><?= $validation->getError('username')  ?></p>
    <br>
    <h3>ROLE</h3>
    <label for="mahasiswa">
        MAHASISWA
    </label>
    <input type="checkbox" value="1" name="is_mahasiswa">
    <br>
    <label for="dosen">
        DOSEN
    </label>
    <input type="checkbox" value="1" name="is_dosen">
    <br>
    <label for="koor">
        KOOR
    </label>
    <input type="checkbox" value="1" name="is_koor">
    <label for="tandik">
        TANDIK
    </label>
    <input type="checkbox" value="1" name="is_tandik">
    <label for="superadmin">
        SUPERADMIN
    </label>
    <input type="checkbox" value="1" name="is_superadmin">
    <button type="submit" name="submit"> tambah</button>
    <div id="result"></div>

</form>
<script>
    var cb1 = document.getElementsByName('is_mahasiswa')
    var cb2 = document.getElementsByName('is_dosen')
    var cb3 = document.getElementsByName('is_koor')
    var cb4 = document.getElementsByName('is_superadmin')
    var button = document.getElementsByName('submit');
    var result = document.getElementById('result');
    button.addEventListener('click', function() {
        if (cb1.checked == true || cb2.checked == true || cb3.checked == true || cb3.checked == true) {
            result.innerHTML = 'Valid';
            button.enable = true;
        } else {
            result.innerHTML = 'Invalid';
            button.disabled = true;
        }
    });
</script>