<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="index.php"><img src="icon/home.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $_SESSION['username'] ?></h5>

                  <!-- List Hotel -->
                  <li class="sub">
                      <a onclick="init();listHotel();" style="cursor:pointer;background:none"><i class="fa fa-list"></i>List Hotel</a>
                  </li>

                  <!-- Hotel Sekitar -->
                  <li class="sub">
                      <a onclick="" style="cursor:pointer;background:none"><i class="fa fa-thumb-tack"></i>Hotel Around You</a>
                      <ul class="treeview-menu">
                        <!-- <li style="margin-top:10px"><input id="inputradius" type="range" name="inputradius" data-highlight="true" min="1" max="10" value="1"></li>                             
                        <li><a onclick="init();hotel_sekitar_user();" style="cursor:pointer;background:none">Search</a></li> -->
                         <div class=" form-group" style="color: black;font-size:8pt;" > <!-- <br> -->
                          <!-- <label>Based On Radius</label><br> -->
                          <label for="inputradius" style="font-size: 10pt";>Radius : </label>
                          <label  id="nilai"  style="font-size: 10pt";>0</label> m
                          
                          <input  type="range" onchange="init();hotel_sekitar_user();cekkk();" id="inputradius" name="inputradius" data-highlight="true" min="0" max="20" value="0" >
                          <script>
                            function cekkk()
                            {
                              document.getElementById('nilai').innerHTML=document.getElementById('inputradius').value*100;
                              console.log(document.getElementById('inputradius').value*100);
                            }
                          </script>
                        </div>

                      </ul>                     
                  </li>

                  <!-- Fungsional Asli -->
                  <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-search"></i>
                        <span>Search Hotel By</span>
                    </a>
                    <ul class="sub">
                      <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Name</a>
                        <ul class="sub">
                          <li style="margin-top:10px"><input id="input_name" type="text" class="form-control"></li>                             
                          <li><a onclick="init();cari_hotel(1)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Address</a>
                        <ul class="sub">
                          <li style="margin-top:10px"><input id="input_address" type="text" class="form-control"></li>                             
                          <li><a onclick="init();cari_hotel(2)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_jenis">
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                }
                              ?>
                            </select>
                          </li>                             
                          <li><a onclick="init();cari_hotel(3)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 1 (Hotel -> Harga Kamar + Fasilitas + Tipe Hotel) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Salsa 1</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Room Price</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: black;font-size:8pt"> Minimum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs1_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: black;font-size:8pt"> Maximum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs1_hmax">
                              <option value=""> - </option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                              <option value="2000000">Rp. 2.000.000,-</option>
                              <option value="3000000">Rp. 3.000.000,-</option>
                            </select>
                          </li>                             
                        </ul>
                      </li>
                      <!-- Pencarian berdasarkan Fasilitas -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <!-- <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility"> -->
                              <!-- <option value=""> - </option> -->
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM facility_hotel"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    // echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    echo "<input type='checkbox' name='fs1_fas' id='fs1_fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            <!-- </select> -->
                          </li>
                        </ul>
                      </li>
                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs1_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>
                      <li><a onclick="init();_fs1()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 2 (Hotel -> Kategori Tempat Ibadah + Fasilitas + Tipe Hotel) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Salsa 2</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Kategori Tempat Ibadah -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Worship Place</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs2_category">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM category_worship_place"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>
                      <!-- Pencarian berdasarkan Fasilitas -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <!-- <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility"> -->
                              <!-- <option value=""> - </option> -->
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM facility_hotel"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    // echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    echo "<input type='checkbox' name='fs2_fas' id='fs2_fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            <!-- </select> -->
                          </li>
                        </ul>
                      </li>
                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs2_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>
                      <li><a onclick="init();_fs2()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 3 (Hotel -> Tempat Wisata + Tipe Hotel + Harga Kamar)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Salsa 3</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Produk Souvenir -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Tourism</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs3_wisata">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM tourism"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs3_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Room Price</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: black;font-size:8pt">Minimum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs3_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: black;font-size:8pt">Maximum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs3_hmax">
                              <option value=""> - </option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                              <option value="2000000">Rp. 2.000.000,-</option>
                              <option value="3000000">Rp. 3.000.000,-</option>
                            </select>
                          </li>                             
                        </ul>
                      </li>

                      <li><a onclick="init();_fs3()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 4 (Hotel ->Kategori Tempat Ibadah + Tempat Wisata + Tipe Hotel)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Salsa 4</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Kategori Tempat Ibadah -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Worship Place</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs4_category">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM category_worship_place"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Produk Souvenir -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Tourism</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs4_wisata">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM tourism"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs4_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fs4()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 5 (Hotel ->Produk UMKM + Produk Souvenir + Tipe Hotel)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Salsa 5</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Produk UMKM -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Small Industries</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs5_si">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, product FROM product_small_industry"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['product'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Produk Souvenir -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Sovenir</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs5_sou">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, product FROM product_souvenir"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['product'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs5_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fs5()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- --------------------------------------------------------------------- -->

                  <!-- Fungsional Reyca 1 (Hotel -> Harga Kamar + Fasilitas + Destinasi) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Reyca 1</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Room Price</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: black;font-size:8pt">Minimum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr1_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: black;font-size:8pt">Maximum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr1_hmax">
                              <option value=""> - </option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                              <option value="2000000">Rp. 2.000.000,-</option>
                              <option value="3000000">Rp. 3.000.000,-</option>
                            </select>
                          </li>                             
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Fasilitas -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <!-- <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility"> -->
                              <!-- <option value=""> - </option> -->
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM facility_hotel"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    // echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    echo "<input type='checkbox' name='fr1_fas' id='fr1_fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            <!-- </select> -->
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Destinasi Angkot -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Destination</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr1_destinasi">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, destination FROM angkot"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['destination'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr1()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Reyca 2 (Hotel -> Tipe Wisata + Harga Kamar + Tipe Hotel) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Reyca 2</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Room Price</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: black;font-size:8pt">Minimum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: black;font-size:8pt">Maximum Price</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_hmax">
                              <option value=""> - </option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                              <option value="2000000">Rp. 2.000.000,-</option>
                              <option value="3000000">Rp. 3.000.000,-</option>
                            </select>
                          </li>                             
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Wisata -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Tourism Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_toty">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM tourism_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr2()" style="cursor:pointer;background:none">Search</a></li>

                    </ul>
                  </li>

                  <!-- Fungsional Reyca 3 (Hotel -> Produk Souvenir + Tipe Hotel + Tipe Industri)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Reyca 3</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Produk Souvenir -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Souvenir</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr3_souvenir">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, product FROM product_souvenir"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['product'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr3_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Destinasi Angkot -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Industry Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr3_intyp">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM industry_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr3()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Reyca 4 (Hotel -> Produk Kuliner + Tipe Hotel + Fasilitas)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional By Reyca 4</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Produk Kuliner -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By KCulinary</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr4_kuliner">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM culinary"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Tipe Hotel -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Type</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr4_type">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM hotel_type"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Fasilitas -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <!-- <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility"> -->
                              <!-- <option value=""> - </option> -->
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM facility_hotel"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    // echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    echo "<input type='checkbox' name='fr4_fas' id='fr4_fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            <!-- </select> -->
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr4()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Reyca 5 (Hotel -> Produk UMKM + Fasilitas + Destinasi)-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional Reyca 5</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Produk Kuliner -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Small Industry</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr5_ik">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, product FROM product_small_industry"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['product'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Fasilitas -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Facility</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <!-- <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility"> -->
                              <!-- <option value=""> - </option> -->
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, name FROM facility_hotel"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['name'];
                                    // echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    echo "<input type='checkbox' name='fr5_fas' id='fr5_fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            <!-- </select> -->
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Destinasi Angkot -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Destination</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr5_destinasi">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, destination FROM angkot"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['destination'];
                                    echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr5()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- --------------------------------------------------------------------- -->

                  <!-- List Gallery -->
                  <li class="sub">
                      <a onclick="init();listGallery();" style="cursor:pointer;background:none"><i class="fa fa-image"></i>List Gallery</a>
                  </li>

                  <!-- Gellery by Hotel Type -->
                  <li class="sub">
                      <a onclick="" style="cursor:pointer;background:none"><i class="fa fa-image"></i>Gallery by Hotel Type</a>
                      <ul class="treeview-menu">
                        <li>  
                          <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="gal_ht">
                            <option value=""> - </option>
                            <?php                      
                            include('../connect.php');    
                            $querysearch="SELECT id, name FROM hotel_type"; 
                            $hasil=pg_query($querysearch);

                              while($baris = pg_fetch_array($hasil)){
                                  $id=$baris['id'];
                                  $name=$baris['name'];
                                  echo "<option value='$id'><span style='font-size:8pt'>$name</span></option>";
                                  // echo "<input type='checkbox' name='fas' id='fas' value='$id'><span style='font-size:8pt'>$name</span></input><br>";
                              }
                            ?>
                          </select>
                        </li>
                        <li><a onclick="init();galleryType()" style="cursor:pointer;background:none">Search</a></li>
                      </ul>                     
                  </li>

                  <!-- Rekomendasi -->
                  <li class="sub">
                      <a onclick="init();menu_rekom();" style="cursor:pointer;background:none">Recomendation</a>
                  </li>

                  <!-- Dashboard -->
                  <li class="sub-menu">
                      <a class="active" href="../">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end