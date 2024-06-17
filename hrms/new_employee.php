<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT *FROM employee_list where id = '{$_GET['id']}'");
$qry = $conn->query("SELECT pob_khmer,pob_english,nationality,cnn,passport,cnb,ca_khmer,ca_english,pc_line1,pc_line2,tel_con,pemail,pemail_bank FROM personal where ".(isset($personal_id) ? $personal_id : ""));
$qry = $conn->query("SELECT pbonus,band,modifi,remark,contract_type,cd_date,cmovement,drecord,pp_month,cpro_date,lstarting_date,lseniority,s_period FROM perfor where ".(isset($perfor_id) ? $perfor_id : ""));
$qry = $conn->query("SELECT marital_status,sp_khmer,sp_english,dob_spouse,sp_nation,soccup,spc_line1,spc_line2,noc,cfull_khmer1,cfull_english1,dob_c1,coccup1,cfull_khmer2,cfull_english2,dob_c2,coccup2,cfull_khmer3,cfull_english3,dob_c3,coccup3,cfull_khmer4,cfull_english4,dob_c4,coccup4,cfull_khmer5,cfull_english5,dob_c5,coccup5 FROM family where ".(isset($family_id) ? $family_id : ""));
$qry = $conn->query("SELECT had,major,uni_ins,edut FROM edu where ".(isset($edu_id) ? $edu_id : ""));
$qry = $conn->query("SELECT nssf,vcard FROM health where ".(isset($health_id) ? $health_id : ""));
$qry = $conn->query("SELECT ecp_khmer,ecp_english,ec_line1,ec_line2,relationship,ecp_ca FROM emergencys where ".(isset($emergencys_id) ? $emergencys_id : ""));
if($qry->num_rows > 0){
	$res = $qry->fetch_array();
	foreach($res as $k => $v){
		if(!is_numeric($k))
		$$k = $v;
	}
}
}
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_employee,manage_emergency,manage_edu,manage_personal,manage_perfor,manage_family,manage_health,manage_department">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Employee Information <span><i class="fa fa-id-badge" aria-hidden="true"></i></span></label>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Staff ID</label>
							<input type="text" name="staff_id" id="staff_id" autofocus value="<?= isset($staff_id) ? $staff_id : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Employment Status</label>
							<select name="employment_status" id="employment_status" value="<?= isset($employment_status) ? $employment_status : "" ?>" class="form-control form-control-sm rounded-0" required>
									<option <?= isset($employment_status) && $employment_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
									<option <?= isset($employment_status) && $employment_status == 'Active' ? 'selected' : '' ?>>Active</option>
                                    <option <?= isset($employment_status) && $employment_status == 'Apply Resign' ? 'selected' : '' ?>>Apply Resign</option>
                                    <option <?= isset($employment_status) && $employment_status == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                    <option <?= isset($employment_status) && $employment_status == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                </select>
						</div>
						<div class="form-group">
						    <input type="hidden" type="date" name="date_created" id="date_created" value="<?php echo isset($date_created) ? $date_created : "" ?>" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">FullName-Khmer</label>
							<input type="text" name="fkhmer" class="form-control form-control-sm" value="<?php echo isset($fkhmer) ? $fkhmer : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">FullName-English</label>
							<input type="text" name="fenglish" class="form-control form-control-sm" required value="<?php echo isset($fenglish) ? $fenglish : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Gender</label>
							<select name="gender" id="gender" value="<?= isset($gender) ? $gender : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option <?= isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Position</label>
							<input type="text" name="position" class="form-control form-control-sm" required value="<?php echo isset($position) ? $position : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Department</label>
							<select name="department" id="department" value="<?php echo isset($department) ? $department : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($department) && $department == 'Finance' ? 'selected' : '' ?>>Finance</option>
                                    <option <?= isset($department) && $department == 'ICT' ? 'selected' : '' ?>>ICT</option>
                                    <option <?= isset($department) && $department == 'Procurement' ? 'selected' : '' ?>>Procurement</option>
                                    <option <?= isset($department) && $department == 'Payroll Office' ? 'selected' : '' ?>>Payroll Office</option>
                                    <option <?= isset($department) && $department == 'HR' ? 'selected' : '' ?>>HR</option>
                                    <option <?= isset($department) && $department == 'In House Project' ? 'selected' : '' ?>>In House Project</option>
                                    <option <?= isset($department) && $department == 'Ground Handling' ? 'selected' : '' ?>>Ground Handling</option>
                                    <option <?= isset($department) && $department == 'Pre-Operation Phase' ? 'selected' : '' ?>>Pre-Operation Phase</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Section</label>
							<select name="section" id="section" value="<?php echo isset($section) ? $section : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($section) && $section == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option <?= isset($section) && $section == 'Batching Plant' ? 'selected' : '' ?>>Batching Plant</option>
                                    <option <?= isset($section) && $section == 'Building Inspection' ? 'selected' : '' ?>>Building Inspection</option>
                                    <option <?= isset($section) && $section == 'CAIC External Work' ? 'selected' : '' ?>>CAIC External Work</option>
                                    <option <?= isset($section) && $section == 'HR' ? 'selected' : '' ?>>HR</option>
                                    <option <?= isset($section) && $section == 'Claim Management' ? 'selected' : '' ?>>Claim Management</option>
                                    <option <?= isset($section) && $section == 'Dredging Plant' ? 'selected' : '' ?>>Dredging Plant</option>
                                    <option <?= isset($section) && $section == 'General Construction & Infrastructure' ? 'selected' : '' ?>>General Consstruction & Infrastructure</option>
                                    <option <?= isset($section) && $section == 'Lake Sand' ? 'selected' : '' ?>>Lake Sand</option>
                                    <option <?= isset($section) && $section == 'Land Dispute Resolution' ? 'selected' : '' ?>>Land Dispute Resolution</option>
                                    <option <?= isset($section) && $section == 'Landside' ? 'selected' : '' ?>>Landside</option>
                                    <option <?= isset($section) && $section == 'Machinery' ? 'selected' : '' ?>>Machinery</option>
                                    <option <?= isset($section) && $section == 'N/A' ? 'selected' : '' ?>>N/A</option>
                                    <option <?= isset($section) && $section == 'Payroll' ? 'selected' : '' ?>>Payroll</option>
                                    <option <?= isset($section) && $section == 'Project Manager' ? 'selected' : '' ?>>Project Manager</option>
                                    <option <?= isset($section) && $section == 'Quantity Surveyor' ? 'selected' : '' ?>>Quantity Surveyor</option>
                                    <option <?= isset($section) && $section == 'Safety' ? 'selected' : '' ?>>Safety</option>
                                    <option <?= isset($section) && $section == 'Security' ? 'selected' : '' ?>>Security</option>
                                    <option <?= isset($section) && $section == 'Site Formation' ? 'selected' : '' ?>>Site Formation</option>
                                    <option <?= isset($section) && $section == 'Worker Wage' ? 'selected' : '' ?>>Worker Wage</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Job Grade</label>
							<select name="job_grade" id="job_grade" value="<?= isset($job_grade) ? $job_grade : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($job_grade) && $job_grade == 'NCO' ? 'selected' : '' ?>>NCO</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG1' ? 'selected' : '' ?>>JG1</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG2' ? 'selected' : '' ?>>JG2</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG3' ? 'selected' : '' ?>>JG3</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG4' ? 'selected' : '' ?>>JG4</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG5' ? 'selected' : '' ?>>JG5</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG6' ? 'selected' : '' ?>>JG6</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG7' ? 'selected' : '' ?>>JG7</option>
									<option <?= isset($job_grade) && $job_grade == 'JG8' ? 'selected' : '' ?>>JG8</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG9' ? 'selected' : '' ?>>JG9</option>
                                    <option <?= isset($job_grade) && $job_grade == 'JG10' ? 'selected' : '' ?>>JG10</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Corporate Rank</label>
							<select name="corporate_rank" id="corporate_rank" value="<?= isset($corporate_rank) ? $corporate_rank : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Non Clerical Clerk' ? 'selected' : '' ?>>Non Clerical Clerk</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Officer' ? 'selected' : '' ?>>Officer</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Senior Officer' ? 'selected' : '' ?>>Senior Officer</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Deputy Manager' ? 'selected' : '' ?>>Deputy Manager</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Manager' ? 'selected' : '' ?>>Manager</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Senior Manager' ? 'selected' : '' ?>>Senior Manager</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Assistant Vice President' ? 'selected' : '' ?>>Assistant Vice President</option>
									<option <?= isset($corporate_rank) && $corporate_rank == 'Vice President' ? 'selected' : '' ?>>Vice President</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Senior Vice President' ? 'selected' : '' ?>>Senior Vice President</option>
                                    <option <?= isset($corporate_rank) && $corporate_rank == 'Executive Vice President' ? 'selected' : '' ?>>Executive Vice President</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Job Grade Level</label>
							<select name="job_grade_level" id="job_grade_level" value="<?= isset($job_grade_level) ? $job_grade_level : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($job_grade_level) && $job_grade_level == 'Non Clerical Clerk' ? 'selected' : '' ?>>Non Clerical Clerk</option>
                                    <option <?= isset($job_grade_level) && $job_grade_level == 'Junior Management' ? 'selected' : '' ?>>Junior Management</option>
                                    <option <?= isset($job_grade_level) && $job_grade_level == 'Middle Management' ? 'selected' : '' ?>>Middle Management</option>
                                    <option <?= isset($job_grade_level) && $job_grade_level == 'Senior Management' ? 'selected' : '' ?>>Senior Management</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Starting Date</label>
							<input type="date" name="start_date" id="start_date" value="<?php echo isset($start_date) ? $start_date : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Seniority at CAIC</label>
							<input type="text" name="seniority" id="seniority" value="<?= isset($seniority) ? $seniority : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Work Location</label>
							<select name="work_location" id="work_location" value="<?= isset($work_location) ? $work_location : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($work_location) && $work_location == 'NPPIA' ? 'selected' : '' ?>>NPPIA</option>
                                    <option <?= isset($work_location) && $work_location == 'Head Office' ? 'selected' : '' ?>>Head Office</option>
                                    <option <?= isset($work_location) && $work_location == 'Canadia Tower' ? 'selected' : '' ?>>Canadia Tower</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Date of Birth</label>
							<input type="date" name="dob" id="dob" value="<?= isset($dob) ? date("D m, Y"($dob)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Probation Period</label>
							<select name="pro_period" id="pro_period" value="<?= isset($pro_period) ? $pro_period : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($pro_period) && $pro_period == '3(Three)Months' ? 'selected' : '' ?>>3(Three)Months</option>
                                    <option <?= isset($pro_period) && $pro_period == '6(Six)Months' ? 'selected' : '' ?>>6(Six)Months</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Converted From</label>
							<select name="converted_from" id="converted_from" value="<?= isset($converted_from) ? $converted_from : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($converted_from) && $converted_from == 'New Hired' ? 'selected' : '' ?>>New Hired</option>
                                    <option <?= isset($converted_from) && $converted_from == 'Converted from Worker' ? 'selected' : '' ?>>Converted from Worker</option>
                                    <option <?= isset($converted_from) && $converted_from == 'Transferred' ? 'selected' : '' ?>>Transferred</option>
                                </select>
						</div>
					</div>
					<div class="form-group">
							<label for="" class="control-label">Personal Info.& Contact <span><i class="fa fa-user-circle" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Place of Birth(Khmer)</label>
							<input type="text" name="pob_khmer" class="form-control form-control-sm" required value="<?php echo isset($pob_khmer) ? $pob_khmer : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Place of Birth(English)</label>
							<input type="text" name="pob_english" class="form-control form-control-sm" required value="<?php echo isset($pob_english) ? $pob_english : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Nationality</label>
							<input type="text" name="nationality" class="form-control form-control-sm" required value="<?php echo isset($nationality) ? $nationality : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Cambodia NID No.</label>
							<input type="text" name="cnn" class="form-control form-control-sm" required value="<?php echo isset($cnn) ? $cnn : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Passport No.</label>
							<input type="text" name="passport" class="form-control form-control-sm" required value="<?php echo isset($passport) ? $passport : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">CNB Bank Account</label>
							<input type="text" name="cnb" class="form-control form-control-sm" required value="<?php echo isset($cnb) ? $cnb : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Current Address(Khmer)</label>
							<input type="text" name="ca_khmer" class="form-control form-control-sm" required value="<?php echo isset($ca_khmer) ? $ca_khmer : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Current Address(English)</label>
							<input type="text" name="ca_english" class="form-control form-control-sm" required value="<?php echo isset($ca_english) ? $ca_english : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Personal Contact(Line1)</label>
							<input type="text" name="pc_line1" class="form-control form-control-sm" required value="<?php echo isset($pc_line1) ? $pc_line1 : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Personal Contact(Line2)</label>
							<input type="text" name="pc_line2" class="form-control form-control-sm" required value="<?php echo isset($pc_line2) ? $pc_line2 : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Telegram Contact</label>
							<input type="text" name="tel_con" class="form-control form-control-sm" required value="<?php echo isset($tel_con) ? $tel_con : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Personal Email</label>
							<input type="text" name="pemail" class="form-control form-control-sm" required value="<?php echo isset($pemail) ? $pemail : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Professional Email(Bank)</label>
							<input type="text" name="pemail_bank" class="form-control form-control-sm" required value="<?php echo isset($pemail_bank) ? $pemail_bank : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Educational Background <span><i class="fa fa-university" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Highest Academic Degree</label>
							<input type="text" name="had" class="form-control form-control-sm" required value="<?php echo isset($had) ? $had : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Major(English)</label>
							<input type="text" name="major" class="form-control form-control-sm" required value="<?php echo isset($major) ? $major : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">University/Institute</label>
							<input type="text" name="uni_ins" class="form-control form-control-sm" required value="<?php echo isset($uni_ins) ? $uni_ins : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Education</label>
							<input type="text" name="edu" class="form-control form-control-sm" required value="<?php echo isset($edu) ? $edu : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Health and Legal Information <span><i class="fa fa-medkit" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group">
							<label for="" class="control-label">NSSF ID Card No.</label>
							<input type="text" name="nssf" class="form-control form-control-sm" required value="<?php echo isset($nssf) ? $nssf : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Vaccination Card No.</label>
							<input type="text" name="vcard" class="form-control form-control-sm" required value="<?php echo isset($vcard) ? $vcard : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact <span><i class="fa fa-compress" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact Person(Name in Khmer)</label>
							<input type="text" name="ecp_khmer" class="form-control form-control-sm" required value="<?php echo isset($ecp_khmer) ? $ecp_khmer : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact Person(Name in English)</label>
							<input type="text" name="ecp_english" class="form-control form-control-sm" required value="<?php echo isset($ecp_english) ? $ecp_english : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact(Line1)</label>
							<input type="text" name="ec_line1" class="form-control form-control-sm" required value="<?php echo isset($ec_line1) ? $ec_line1 : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact(Line2)</label>
							<input type="text" name="ec_line2" class="form-control form-control-sm" required value="<?php echo isset($ec_line2) ? $ec_line2 : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Relationship</label>
							<input type="text" name="relationship" class="form-control form-control-sm" required value="<?php echo isset($relationship) ? $relationship : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Emergency Contact Person(Current Address)</label>
							<input type="text" name="ecp_ca" class="form-control form-control-sm" required value="<?php echo isset($ecp_ca) ? $ecp_ca : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
							<label for="" class="control-label">Images</label>
							<div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                      <label class="custom-file-label" for="customFile">Choose file</label>
		                    </div>
						</div>
						<div class="form-group d-flex justify-content-center align-items-center">
							<img src="<?php echo isset($avatar) ? 'assets/uploads/'.$avatar :'' ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Family Details <span><i class="fa fa-users" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Marital Status</label>
							<select name="marital_status" id="marital_status" value="<?= isset($marital_status) ? $marital_status : "" ?>" class="form-control form-control-sm rounded-0" required onchange="toggleFamilyFields()">
                                    <option <?= isset($marital_status) && $marital_status == 'Single' ? 'selected' : '' ?>>Single</option>
                                    <option <?= isset($marital_status) && $marital_status == 'Married' ? 'selected' : '' ?>>Married</option>
                                    <option <?= isset($marital_status) && $marital_status == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
									<option <?= isset($marital_status) && $marital_status == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                </select>
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Spouse FullName(Khmer)</label>
							<input type="text" name="sp_khmer" class="form-control form-control-sm" required value="<?php echo isset($sp_khmer) ? $sp_khmer : '' ?>">
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Spouse FullName(English)</label>
							<input type="text" name="sp_english" class="form-control form-control-sm" required value="<?php echo isset($sp_english) ? $sp_english : '' ?>">
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Date of Birth(Spouse)</label>
							<input type="date" name="dob_spouse" id="dob_spouse" value="<?= isset($dob_spouse) ? date("D m, Y"($dob_spouse)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Nationality</label>
							<input type="text" name="sp_nation" id="sp_nation" value="<?= isset($sp_nation) ? date("D m, Y"($sp_nation)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Spouse Occupation</label>
							<input type="text" name="soccup" class="form-control form-control-sm" required value="<?php echo isset($soccup) ? $soccup : '' ?>">
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Spouse Contact No.(Line1)</label>
							<input type="text" name="spc_line1" class="form-control form-control-sm" required value="<?php echo isset($spc_line1) ? $spc_line1 : '' ?>">
						</div>
						<div class="form-group spouse-fields">
							<label for="" class="control-label">Spouse Contact No.(Line2)-Optional</label>
							<input type="text" name="spc_line2" class="form-control form-control-sm" required value="<?php echo isset($spc_line2) ? $spc_line2 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">No. of Children</label>
							<input type="text" name="noc" class="form-control form-control-sm" required value="<?= isset($noc) ? $noc : '' ?>" oninput="toggleChildrenFields()">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">1st Children FullName(Khmer)</label>
							<input type="text" name="cfull_khmer1" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer1) ? $cfull_khmer1 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">1st Children FullName(English)</label>
							<input type="text" name="cfull_english1" class="form-control form-control-sm" required value="<?php echo isset($cfull_english1) ? $cfull_english1 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">1st Child Date of Birth</label>
							<input type="date" name="dob_c1" id="dob_c1" value="<?= isset($dob_c1) ? date("D m, Y"($dob_c1)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">1st Children Occupation</label>
							<input type="text" name="coccup1" class="form-control form-control-sm" required value="<?php echo isset($coccup1) ? $coccup1 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">2nd Children FullName(Khmer)</label>
							<input type="text" name="cfull_khmer2" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer2) ? $cfull_khmer2 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">2nd Children FullName(English)</label>
							<input type="text" name="cfull_english2" class="form-control form-control-sm" required value="<?php echo isset($cfull_english2) ? $cfull_english2 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">2nd Child Date of Birth</label>
							<input type="date" name="dob_c2" id="dob_c2" value="<?= isset($dob_c2) ? date("D m, Y"($dob_c2)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">2nd Children Occupation</label>
							<input type="text" name="coccup2" class="form-control form-control-sm" required value="<?php echo isset($coccup2) ? $coccup2 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">3rd Children FullName(Khmer)</label>
							<input type="text" name="cfull_khmer3" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer3) ? $cfull_khmer3 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">3rd Children FullName(English)</label>
							<input type="text" name="cfull_english3" class="form-control form-control-sm" required value="<?php echo isset($cfull_english3) ? $cfull_english3 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">3rd Child Date of Birth</label>
							<input type="date" name="dob_c3" id="dob_c3" value="<?= isset($dob_c3) ? date("D m, Y"($dob_c3)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">3rd Children Occupation</label>
							<input type="text" name="coccup3" class="form-control form-control-sm" required value="<?php echo isset($coccup3) ? $coccup3 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">4th Children FullName(Khmer)</label>
							<input type="text" name="cfull_khmer4" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer4) ? $cfull_khmer4 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">4th Children FullName(English)</label>
							<input type="text" name="cfull_english4" class="form-control form-control-sm" required value="<?php echo isset($cfull_english4) ? $cfull_english4 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">4th Child Date of Birth</label>
							<input type="date" name="dob_c4" id="dob_c4" value="<?= isset($dob_c4) ? date("D m, Y"($dob_c4)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">4th Children Occupation</label>
							<input type="text" name="coccup4" class="form-control form-control-sm" required value="<?php echo isset($coccup4) ? $coccup4 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">5th Children FullName(Khmer)</label>
							<input type="text" name="cfull_khmer5" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer5) ? $cfull_khmer5 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">5th Children FullName(English)</label>
							<input type="text" name="cfull_english5" class="form-control form-control-sm" required value="<?php echo isset($cfull_english5) ? $cfull_english5 : '' ?>">
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">5th Child Date of Birth</label>
							<input type="date" name="dob_c5" id="dob_c5" value="<?= isset($dob_c5) ? date("D m, Y"($dob_c5)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group children-fields">
							<label for="" class="control-label">5th Children Occupation</label>
							<input type="text" name="coccup5" class="form-control form-control-sm" required value="<?php echo isset($coccup5) ? $coccup5 : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Performance and Compensation <span><i class="fa fa-info-circle" aria-hidden="true"></i></span></label>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Performance Bonus(for the years)</label>
							<input type="text" name="pbonus" class="form-control form-control-sm" required value="<?php echo isset($pbonus) ? $pbonus : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Band(for the years)</label>
							<input type="text" name="band" class="form-control form-control-sm" required value="<?php echo isset($band) ? $band : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Modification(for the years)</label>
							<input type="text" name="modifi" class="form-control form-control-sm" required value="<?php echo isset($modifi) ? $modifi : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Remark(for each year)</label>
							<input type="text" name="remark" class="form-control form-control-sm" required value="<?php echo isset($remark) ? $remark : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Contract Type</label>
							<select name="contract_type" id="contract_type" value="<?= isset($contract_type) ? $contract_type : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($contract_type) && $contract_type == 'UDC' ? 'selected' : '' ?>>UDC</option>
                                    <option <?= isset($contract_type) && $contract_type == 'FDC' ? 'selected' : '' ?>>FDC</option>
                                </select>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Contract Due Date(If FDC)</label>
							<input type="date" name="cd_date" id="cd_date" value="<?= isset($cd_date) ? date("D m, Y"($cd_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Career Movement within CAIC</label>
							<input type="text" name="cmovement" class="form-control form-control-sm" required value="<?php echo isset($cmovement) ? $cmovement : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Disciplinary Record</label>
							<select name="drecord" id="drecord" value="<?= isset($drecord) ? $drecord : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($drecord) && $drecord == 'Yes' ? 'selected' : '' ?>>Yes</option>
                                    <option <?= isset($drecord) && $drecord == 'No' ? 'selected' : '' ?>>No</option>
                                </select>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Probationary Period(in month)</label>
							<input type="text" name="pp_month" class="form-control form-control-sm" required value="<?php echo isset($pp_month) ? $pp_month : '' ?>">
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Confirm Pro. Date</label>
							<input type="date" name="cpro_date" id="cpro_date" value="<?= isset($cpro_date) ? date("D m, Y"($cpro_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Latest Starting Date at Group</label>
							<input type="date" name="lstarting_date" id="lstarting_date" value="<?= isset($lstarting_date) ? date("D m, Y"($lstarting_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Latest Seniority from Group</label>
							<input type="date" name="lseniority" id="lseniority" value="<?= isset($lseniority) ? date("D m, Y"($lseniority)) : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group conditional-hide">
							<label for="" class="control-label">Suspension Period</label>
							<input type="text" name="s_period" class="form-control form-control-sm" required value="<?php echo isset($s_period) ? $s_period : '' ?>">
						</div>

					</div>
				</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=employee_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
    function toggleChildrenFields() {
        var numberOfChildren = parseInt(document.getElementById("noc").value);
        var childrenFields = document.querySelectorAll(".children-fields");

        childrenFields.forEach(function(field, index) {
            if (index < numberOfChildren) {
                field.style.display = "block";
            } else {
                field.style.display = "none";
            }
        });
    }

    // Call the function initially to set the visibility based on the initial value of 'No. of Children'
    toggleChildrenFields();

    // Attach onchange event listener to trigger the function when the value changes
    document.getElementById("noc").onchange = toggleChildrenFields;
</script>
<script>
$(document).ready(function(){
    $('#date_created').change(function(){
        var currentDate = new Date($(this).val());
        var nextDay = new Date(currentDate);
        nextDay.setDate(currentDate.getDate() + 1);

        var today = new Date();

        if (nextDay <= today) {
            $('#employment_status').val('Active');
        }
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var employmentStatusSelect = document.getElementById("employment_status");
        var hiddenElements = document.querySelectorAll(".conditional-hide");

        function toggleElementsVisibility() {
            var selectedOption = employmentStatusSelect.value;
            if (selectedOption === "Pending") {
                hiddenElements.forEach(function(element) {
                    element.style.display = "none";
                });
            } else {
                hiddenElements.forEach(function(element) {
                    element.style.display = "block";
                });
            }
        }

        employmentStatusSelect.addEventListener("change", toggleElementsVisibility);

        toggleElementsVisibility();
    });
</script>
<script>
    function toggleFamilyFields() {
        var maritalStatus = document.getElementById("marital_status").value;
        var spouseFields = document.querySelectorAll(".spouse-fields");
        var childrenFields = document.querySelectorAll(".children-fields");

        if (maritalStatus === "Single") {
            spouseFields.forEach(function(field) {
                field.style.display = "none";
            });
            childrenFields.forEach(function(field) {
                field.style.display = "none";
            });
        } else {
            spouseFields.forEach(function(field) {
                field.style.display = "block";
            });
            childrenFields.forEach(function(field) {
                field.style.display = "block";
            });
        }
    }
</script>
<script>
                      document.getElementById('type_of_submission').addEventListener('change', function() {
                        var typeOfSubmission = this.value;
                        var employmentStatus = document.getElementById('employment_status');

                        if (typeOfSubmission === 'resign') {
                          // Logic to determine if it should be 'Apply Resign' or 'Inactive'
                          var staffId = document.getElementById('staff_id').value;
                          if (staffId) {
                            // Example logic based on staff_id (you can customize this as needed)
                            employmentStatus.value = 'Apply Resign';
                          } else {
                            employmentStatus.value = 'Inactive';
                          }
                        }
                      });
                    </script>
<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_employee').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		if($('[name="password"]').val() != '' && $('[name="cpass"]').val() != ''){
			if($('#pass_match').attr('data-status') != 1){
				if($("[name='password']").val() !=''){
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
		$.ajax({
			url:'ajax.php?action=save_employee',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=employee_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>