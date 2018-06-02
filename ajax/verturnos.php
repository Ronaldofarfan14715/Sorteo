<?php


require_once("../model/conexion.php");

$con=new Conexion();
$cn=$con->Conexion();
$query="SELECT id_turno,doce_max,contador FROM turnos";
$rs=$cn->query($query);

$array= array();

while($fr=$rs->fetch_row()){
	if($fr[1]==$fr[2]){
		$cond=" disabled='true'  data-info='marcado' hidden='true' ";
		$bg=" style='background:rgba(255, 0, 0, 0.59);'";
	}else{
		$cond="disabled='true'  ";
		$bg=" style='background:white' ";
	}
	$array += [$fr[0] => ['cond'=>$cond,'bg' =>$bg]];
}
//echo $array[18];
?>

<table class="table text-center">

							<thead class="thead-dark">
								<tr>
									<th scope="col">HORA/DIA</th>
									<th scope="col">LUNES</th>
									<th scope="col">MARTES</th>
									<th scope="col">MIERCOLES</th>
									<th scope="col">JUEVES</th>
									<th scope="col">VIERNES</th>
								</tr>

							</thead>
							<tbody>
								<tr>
									<th scope="row">8:00 am-10:00 am</th>
									<td <?php echo $array[18]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[18]['cond']?> class="form-check-input"   value="18" name="chk[]" id="18">

										</div>
									</td>
									<td <?php echo $array[28]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[28]['cond']?> class="form-check-input"   value="28"  name="chk[]"  id="28" >

										</div>
									</td>
									<td <?php echo $array[38]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[38]['cond']?> class="form-check-input"   value="38" name="chk[]" id="38">

										</div>
									</td>
									<td <?php echo $array[48]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[48]['cond']?> class="form-check-input"    value="48" name="chk[]" id="48">

										</div>
									</td>
									<td <?php echo $array[58]['bg']?> >
										<div class="form-check"  >
												<input type="checkbox" <?php echo $array[58]['cond']?> class="form-check-input"   value="58"  name="chk[]" id="58">

										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">10:00 am-12:00 pm</th>
									<td <?php echo $array[110]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[110]['cond']?> class="form-check-input"   value="110"  name="chk[]"  id="110" >

										</div>
									</td>
									<td <?php echo $array[210]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[210]['cond']?> class="form-check-input"    value="210" name="chk[]"  id="210" >

										</div>
									</td>
									<td <?php echo $array[310]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[310]['cond']?> class="form-check-input"   value="310"  name="chk[]" id="310" >

										</div>
									</td>
									<td <?php echo $array[410]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[410]['cond']?> class="form-check-input"    value="410" name="chk[]" id="410" >

										</div>
									</td>
									<td <?php echo $array[510]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[510]['cond']?> class="form-check-input"    value="510" name="chk[]" id="510" >

										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">12:00 pm-14:00 pm</th>
									<td <?php echo $array[112]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[112]['cond']?> class="form-check-input"    value="112" name="chk[]"  id="112" >

										</div>
									</td>
									<td <?php echo $array[212]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[212]['cond']?> class="form-check-input"    value="212" name="chk[]"  id="212" >

										</div>
									</td>
									<td <?php echo $array[312]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[312]['cond']?> class="form-check-input"    value="312" name="chk[]" id="312" >

										</div>
									</td>
									<td <?php echo $array[412]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[412]['cond']?> class="form-check-input"    value="412" name="chk[]" id="412" >

										</div>
									</td>
									<td <?php echo $array[512]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[512]['cond']?> class="form-check-input"   value="512"  name="chk[]" id="512" >

										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">14:00 pm-16:00 pm</th>
									<td <?php echo $array[114]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[114]['cond']?> class="form-check-input"    value="114" name="chk[]"  id="114" >

										</div>
									</td>
									<td <?php echo $array[214]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[214]['cond']?> class="form-check-input"    value="214" name="chk[]"  id="214" >

										</div>
									</td>
									<td <?php echo $array[314]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[314]['cond']?> class="form-check-input"   value="314"  name="chk[]" id="314" >

										</div>
									</td>
									<td <?php echo $array[414]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[414]['cond']?> class="form-check-input"   value="414"  name="chk[]" id="414" >

										</div>
									</td>
									<td <?php echo $array[514]['bg']?> >
										<div class="form-check"  >
											<input type="checkbox" <?php echo $array[514]['cond']?> class="form-check-input"   value="514"  name="chk[]" id="514" >

										</div>
									</td>
								</tr>


							</tbody>
						</table>