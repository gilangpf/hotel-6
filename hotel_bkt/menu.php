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
                         <div class=" form-group" style="color: white;" > <!-- <br> -->
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
                                    echo "<option value='$id'>$name</option>";
                                }
                              ?>
                            </select>
                          </li>                             
                          <li><a onclick="init();cari_hotel(3)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 1 (Hotel -> Harga Kamar + Fasilitas + Tipe Hotel-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional Salsa 1</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Harga Kamar</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: white">Harga Minimum</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs1_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: white">Harga Maximum</span>
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
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Fasilitas</a>
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
                                    // echo "<option value='$id'>$name</option>";
                                    echo "<input type='checkbox' name='fs1_fas' id='fs1_fas' value='$id'>$name</input><br>";
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
                                    echo "<option value='$id'>$name</option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'>$name</input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>
                      <li><a onclick="init();_fs1()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Salsa 1 (Hotel -> Harga Kamar + Fasilitas + Tipe Hotel-->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional Salsa 1</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Harga Kamar</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: white">Harga Minimum</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fs1_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: white">Harga Maximum</span>
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
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Fasilitas</a>
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
                                    // echo "<option value='$id'>$name</option>";
                                    echo "<input type='checkbox' name='fs1_fas' id='fs1_fas' value='$id'>$name</input><br>";
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
                                    echo "<option value='$id'>$name</option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'>$name</input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>
                      <li><a onclick="init();_fs1()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- --------------------------------------------------------------------- -->

                  <!-- Fungsional Reyca 1 (Hotel -> Harga Kamar + Fasilitas + Destinasi) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional Reyca 1</span>
                    </a>
                    <ul class="sub">
                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Harga Kamar</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: white">Harga Minimum</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr1_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: white">Harga Maximum</span>
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
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Fasilitas</a>
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
                                    // echo "<option value='$id'>$name</option>";
                                    echo "<input type='checkbox' name='fr1_fas' id='fr1_fas' value='$id'>$name</input><br>";
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
                                    echo "<option value='$id'>$name</option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'>$name</input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr1()" style="cursor:pointer;background:none">Search</a></li>
                    </ul>
                  </li>

                  <!-- Fungsional Reyca 2 (Hotel -> Destinasi + Harga Kamar + Tipe Hotel) -->
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-search"></i>
                      <span>Fungsional Reyca 2</span>
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
                                    echo "<option value='$id'>$name</option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'>$name</input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <!-- Pencarian berdasarkan Harga Kamar -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Harga Kamar</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <span style="background: none;color: white">Harga Minimum</span>
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_hmin">
                              <option value=""> - </option>
                              <option value="30000">Rp. 30.000,-</option>
                              <option value="100000">Rp. 100.000,-</option>
                              <option value="500000">Rp. 500.000,-</option>
                              <option value="1000000">Rp. 1.000.000,-</option>
                            </select>
                            <span style="background: none;color: white">Harga Maximum</span>
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

                      <!-- Pencarian berdasarkan Destinasi Angkot -->
                      <li class="sub">
                        <a style="cursor:pointer;background:none"><i class="fa fa-search"></i> By Destination</a>
                        <ul class="sub">
                          <li style="margin-top:10px">
                            <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="fr2_destinasi">
                              <option value=""> - </option>
                              <?php                      
                              include('../connect.php');    
                              $querysearch="SELECT id, destination FROM angkot"; 
                              $hasil=pg_query($querysearch);

                                while($baris = pg_fetch_array($hasil)){
                                    $id=$baris['id'];
                                    $name=$baris['destination'];
                                    echo "<option value='$id'>$name</option>";
                                    // echo "<input type='checkbox' name='fas' id='fas' value='$id'>$name</input><br>";
                                }
                              ?>
                            </select>
                          </li>
                        </ul>
                      </li>

                      <li><a onclick="init();_fr2()" style="cursor:pointer;background:none">Search</a></li>

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