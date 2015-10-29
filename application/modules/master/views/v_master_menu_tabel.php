                                 <?php
                                 $array_kategori = array();
                                 // for ($i=0; $i < sizeof($kategori_menu); $i++) { 
                                 //    $array_kategori[$kategori_menu[$i]->id] = '<span class="label label-sm label-danger">'.$kategori_menu[$i]->nama.'</span>';
                                 // }
                                 $array_kategori = array(
                                    '1' => '<span class="label label-sm label-primary">'.$kategori_menu[0]->nama.'</span>',
                                    '2' => '<span class="label label-sm label-success">'.$kategori_menu[1]->nama.'</span>',
                                    '3' => '<span class="label label-sm label-warning">'.$kategori_menu[2]->nama.'</span>'
                                    );
                                 ?>
                                 <table class="table table-striped table-hover" >
                                    <thead>
                                       <tr>
                                          <th style="text-align:center">No</th>
                                          <th style="text-align:center">Kode</th>
                                          <th style="text-align:center">Nama</th>
                                          <th style="text-align:center">Kategori</th>
                                          <th style="text-align:center">HPP</th>
                                          <th style="text-align:center">Harga Jual</th>
                                          <th style="text-align:center">Aksi</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($menu))
                                       foreach ($menu as $key => $value) { 
                                    ?>
                                       <tr>
                                          <td style="text-align:center"><?php echo $no; ?></td>
                                          <td class="col_kode_menu"><?php echo $value->code; ?></td>
                                          <td class="col_nama_menu"><?php echo $value->nama; ?></td>
                                          <td class="col_kat_menu" kat="<?php echo $value->kategori; ?>" style="text-align:center"><?php echo $array_kategori[$value->kategori]; ?></td>
                                          <td class="col_hpp_menu" harga="<?php echo $value->hpp; ?>" style="text-align:right"><?php echo format_rupiah($value->hpp); ?></td>
                                          <td class="col_harga_menu" harga="<?php echo $value->harga; ?>" style="text-align:right"><?php echo format_rupiah($value->harga); ?></td>
                                          <td>
                                             <center>
                                                <button type="submit" class="btn yellow btn-sm btn-edit-menu"><i class=" icon-edit"></i> Edit</button>
                                                <!-- <button type="submit" class="btn red btn-sm btn-del-menu"><i class=" icon-remove"></i> Delete</button> -->
                                             </center>
                                          </td>
                                       </tr>
                                    <?php 
                                       $no++;
                                       }
                                    else
                                       echo "<tr><td colspan='7' style='text-align:center'>Tidak Ada Data</td></tr>"
                                    ?>
                                    </tbody>
                                 </table>
                                 <center><?php echo (!empty($pagination))?$pagination:''; ?></center>