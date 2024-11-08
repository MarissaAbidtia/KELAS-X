<?php
    $sql="SELECT * from jadwal"
    echo $sql;

    $hasil = mysqli_query($koneksi,$sql);
    while ($row = mysqli_fetct_array($hasil)){
        echo $row[1]
    ?>

    <div class="jadwal">
        <h2><?php = row [1]?></h2>
        <h2><?php = row [2]?></h2>
        
    </div>
    <?php
    }
    ?>
