<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *, CONCAT(' ',' ',' ',' ',' ') as fullname FROM `employee_list` where id = '{$_GET['id']}'");
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
<div class="content py-4">
    <div class="card card-outline card-navy shadow rounded-0">
        <div class="card-header">
            <h5 class="card-title">Employee Details</h5>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary btn-flat" href="./?page=employees/manage_employee&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <button class="btn btn-sm btn-danger btn-flat" id="delete_employee"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-sm btn-success bg-success btn-flat" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                <a href="./?page=employee_list" class="btn btn-default border btn-sm btn-flat"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid" id="outprint">
            <fieldset>
                    <legend class="text-muted">Employee Record</legend>
                    <table class="table table-stripped table-bordered" id="employee-record">
                        <thead>
                            <tr class="bg-gradient-dark">
                            <th class="text-center">#</th>
						        <th class="text-center">Staff ID</th>
						        <th class="text-center">FullName(Khmer)</th>
						        <th class="text-center">FullName(English)</th>
						        <th class="text-center">Gender</th>
						        <th class="text-center">Position</th>
						        <th class="text-center">Department</th>
						        <th class="text-center">Section</th>
						        <th class="text-center">Job Grade</th>
						        <th class="text-center">Corporate Rank</th>
						        <th class="text-center">Job Grade Level</th>
						        <th class="text-center">Starting Date</th>
                                <th class="text-center">Seniority at CAIC</th>
						        <th class="text-center">Work Location</th>
						        <th class="text-center">Date of Birth</th>
						        <th class="text-center">Probation Period</th>
						        <th class="text-center">Converted From</th>
						        <th class="text-center">Place of Birth(Khmer)</th>
						        <th class="text-center">Place of Birth(English)</th>
						        <th class="text-center">Nationality</th>
						        <th class="text-center">Cambodia NID No.</th>
						        <th class="text-center">Passport No.</th>
						        <th class="text-center">CNB Bank Account</th>
						        <th class="text-center">Current Address(Khmer)</th>
                                <th class="text-center">Current Address(English)</th>
						        <th class="text-center">Personal Contact(Line1)</th>
						        <th class="text-center">Personal Contact(Line2)</th>
						        <th class="text-center">Telegram Contact</th>
						        <th class="text-center">Personal Email</th>
						        <th class="text-center">Professional Email(Bank)</th>
						        <th class="text-center">Highest Academic Degree</th>
						        <th class="text-center">Major(English)</th>
						        <th class="text-center">University/Institute</th>
						        <th class="text-center">Education</th>
						        <th class="text-center">NSSF ID Card No.</th>
						        <th class="text-center">Vaccination Card No.</th>
                                <th class="text-center">Emergency Contact Person(Name in Khmer)</th>
						        <th class="text-center">Emergency Contact Person(Name in English)</th>
						        <th class="text-center">Emergency Contact(Line1)</th>
						        <th class="text-center">Emergency Contact(Line2)</th>
						        <th class="text-center">Relationship</th>
						        <th class="text-center">Emergency Contact Person(Current Address)</th>
						        <th class="text-center">Marital Status</th>
                                <th class="text-center">Spouse FullName(Khmer)</th>
						        <th class="text-center">Spouse FullName(English)</th>
						        <th class="text-center">Date of Birth(Spouse)</th>
						        <th class="text-center">Nationality</th>
                                <th class="text-center">Spouse Occupation</th>
						        <th class="text-center">Spouse Contact No.(Line1)</th>
						        <th class="text-center">Spouse Contact No.(Line2)-Optional</th>
						        <th class="text-center">No. of Children</th>
						        <th class="text-center">1st Children FullName(Khmer)</th>
						        <th class="text-center">1st Children FullName(English)</th>
						        <th class="text-center">1st Child Date of Birth</th>
						        <th class="text-center">1st Children Occupation</th>
                                <th class="text-center">2nd Children FullName(Khmer)</th>
						        <th class="text-center">2nd Children FullName(English)</th>
						        <th class="text-center">2nd Child Date of Birth</th>
						        <th class="text-center">2nd Children Occupation</th>
                                <th class="text-center">3rd Children FullName(Khmer)</th>
						        <th class="text-center">3rd Children FullName(English)</th>
						        <th class="text-center">3rd Child Date of Birth</th>
						        <th class="text-center">3rd Children Occupation</th>
                                <th class="text-center">4th Children FullName(Khmer)</th>
						        <th class="text-center">4th Children FullName(English)</th>
						        <th class="text-center">4th Child Date of Birth</th>
						        <th class="text-center">4th Children Occupation</th>
                                <th class="text-center">5th Children FullName(Khmer)</th>
						        <th class="text-center">5th Children FullName(English)</th>
						        <th class="text-center">5th Child Date of Birth</th>
						        <th class="text-center">5th Children Occupation</th>
						        <th class="text-center">Performance Bonus(for the years)</th>
						        <th class="text-center">Band(for the years)</th>
						        <th class="text-center">Modification(for the years)</th>
						        <th class="text-center">Remark(for each year)</th>
                                <th class="text-center">Contract Type</th>
						        <th class="text-center">Contract Due Date(If FDC)</th>
						        <th class="text-center">Career Movement within CAIC</th>
						        <th class="text-center">Disciplinary Record</th>
						        <th class="text-center">Probationary Period(in month)</th>
						        <th class="text-center">Confirm Pro. Date</th>
						        <th class="text-center">Latest Starting Date at Group</th>
						        <th class="text-center">Latest Seniority from Group</th>
						        <th class="text-center">Suspension Period</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $employees = $conn->query("SELECT
    e.staff_id,
    e.employment_status,
    e.fkhmer,
    e.fenglish,
    e.gender,
    e.position,
    e.department,
    e.section,
    e.job_grade,
    e.corporate_rank,
    e.job_grade_level,
    e.starting_date,
    e.seniority,
    e.dob,
    e.pro_period,
    e.converted_from,
    
    p.pob_khmer,
    p.pob_english,
    p.nationality,
    p.cnn,
    p.passport,
    p.cnb,
    p.ca_khmer,
    p.ca_english,
    p.pc_line1,
    p.pc_line2,
    p.tel_con,
    p.pemail,
    p.pemail_bank,
    
    edu.had,
    edu.major,
    edu.uni_ins,
    edu.edu,
    
    h.nssf,
    h.vcard,
    
    emg.ecp_khmer,
    emg.ecp_english,
    emg.ec_line1,
    emg.ec_line2,
    emg.relationship,
    emg.ecp_ca,
    
    f.sp_khmer,
    f.sp_english,
    f.dob_spouse,
    f.sp_nation,
    f.soccup,
    f.spc_line1,
    f.spc_line2,
    f.noc,
    f.cfull_khmer1,
    f.cfull_english1,
    f.dob_c1,
    f.coccup1,
    f.cfull_khmer2,
    f.cfull_english2,
    f.dob_c2,
    f.coccup2,
    f.cfull_khmer3,
    f.cfull_english3,
    f.dob_c3,
    f.coccup3,
    f.cfull_khmer4,
    f.cfull_english4,
    f.dob_c4,
    f.coccup4,
    f.cfull_khmer5,
    f.cfull_english5,
    f.dob_c5,
    f.coccup5,
    
    pf.pbonus,
    pf.band,
    pf.modifi,
    pf.remark,
    pf.contract_type,
    pf.cd_date,
    pf.cmovement,
    pf.drecord,
    pf.pp_month,
    pf.cpro_date,
    pf.lstarting_date,
    pf.lseniority,
    pf.s_period,
    pf.working_day,
    pf.ror
FROM
    employee_list e
LEFT JOIN
    personal p ON e.staff_id = p.staff_id
LEFT JOIN
    edu edu ON e.staff_id = edu.staff_id
LEFT JOIN
    health h ON e.staff_id = h.staff_id
LEFT JOIN
    emergencys emg ON e.staff_id = emg.staff_id
LEFT JOIN
    family f ON e.staff_id = f.staff_id
LEFT JOIN
    perfor pf ON e.staff_id = pf.staff_id
ORDER BY
    e.staff_id;");
                            if($qry->num_rows > 0){
				    		$res = $qry->fetch_array();
							$i=1;
				    		foreach($res as $k => $v){
				    		    if(!is_numeric($k))
				    		    $$k = $v;
				    }
   				}
                            ?>
                            <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
						        <td class="text-center"><b><?php echo $staff_id ?></b></td>
						        <td class="text-center"><b><?php echo $fkhmer ?></b></td>
						        <td class="text-center"><b><?php echo $fenglish ?></b></td>
						        <td class="text-center"><b><?php echo $gender ?></b></td>
						        <td class="text-center"><b><?php echo $position ?></b></td>
						        <td class="text-center"><b><?php echo $department ?></b></td>
						        <td class="text-center"><b><?php echo $section ?></b></td>
						        <td class="text-center"><b><?php echo $job_grade ?></b></td>
						        <td class="text-center"><b><?php echo $corporate_rank ?></b></td>
						        <td class="text-center"><b><?php echo $job_grade_level ?></b></td>
						        <td class="text-center"><b><?php echo $start_date ?></b></td>
                                <td class="text-center"><b><?php echo $seniority ?></b></td>
						        <td class="text-center"><b><?php echo $work_location ?></b></td>
						        <td class="text-center"><b><?php echo $dob ?></b></td>
						        <td class="text-center"><b><?php echo $pro_period ?></b></td>
						        <td class="text-center"><b><?php echo $converted_from ?></b></td>
						        <td class="text-center"><b><?php echo $pob_khmer ?></b></td>
						        <td class="text-center"><b><?php echo $pob_english ?></b></td>
						        <td class="text-center"><b><?php echo $nationality ?></b></td>
						        <td class="text-center"><b><?php echo $cnn ?></b></td>
						        <td class="text-center"><b><?php echo $passport?></b></td>
						        <td class="text-center"><b><?php echo $cnb ?></b></td>
                                <td class="text-center"><b><?php echo $ca_khmer ?></b></td>
						        <td class="text-center"><b><?php echo $ca_english ?></b></td>
						        <td class="text-center"><b><?php echo $pc_line1 ?></b></td>
						        <td class="text-center"><b><?php echo $pc_line2 ?></b></td>
						        <td class="text-center"><b><?php echo $tel_con ?></b></td>
						        <td class="text-center"><b><?php echo $pemail ?></b></td>
						        <td class="text-center"><b><?php echo $pemail_bank ?></b></td>
						        <td class="text-center"><b><?php echo $had ?></b></td>
						        <td class="text-center"><b><?php echo $major ?></b></td>
						        <td class="text-center"><b><?php echo $uni_ins ?></b></td>
						        <td class="text-center"><b><?php echo $edu ?></b></td>
                                <td class="text-center"><b><?php echo $nssf ?></b></td>
						        <td class="text-center"><b><?php echo $vcard ?></b></td>
						        <td class="text-center"><b><?php echo $ecp_khmer ?></b></td>
						        <td class="text-center"><b><?php echo $ecp_english ?></b></td>
						        <td class="text-center"><b><?php echo $ec_line1 ?></b></td>
						        <td class="text-center"><b><?php echo $ec_line2 ?></b></td>
						        <td class="text-center"><b><?php echo $relationship ?></b></td>
						        <td class="text-center"><b><?php echo $ecp_ca ?></b></td>
						        <td class="text-center"><b><?php echo $marital_status ?></b></td>
                                <td class="text-center"><b><?php echo $sp_khmer ?></b></td>
                                <td class="text-center"><b><?php echo $sp_english ?></b></td>
						        <td class="text-center"><b><?php echo $dob_spouse ?></b></td>
						        <td class="text-center"><b><?php echo $sp_nation ?></b></td>
						        <td class="text-center"><b><?php echo $soccup ?></b></td>
						        <td class="text-center"><b><?php echo $spc_line1 ?></b></td>
						        <td class="text-center"><b><?php echo $spc_line2 ?></b></td>
						        <td class="text-center"><b><?php echo $noc ?></b></td>
						        <td class="text-center"><b><?php echo $cfull_khmer1 ?></b></td>
						        <td class="text-center"><b><?php echo $cfull_english1 ?></b></td>
						        <td class="text-center"><b><?php echo $dob_c1 ?></b></td>
						        <td class="text-center"><b><?php echo $coccup1 ?></b></td>
                                <td class="text-center"><b><?php echo $cfull_khmer2 ?></b></td>
						        <td class="text-center"><b><?php echo $full_english2 ?></b></td>
						        <td class="text-center"><b><?php echo $dob_c2 ?></b></td>
						        <td class="text-center"><b><?php echo $coccup2 ?></b></td>
                                <td class="text-center"><b><?php echo $cfull_khmer3 ?></b></td>
						        <td class="text-center"><b><?php echo $full_english3 ?></b></td>
						        <td class="text-center"><b><?php echo $dob_c3 ?></b></td>
						        <td class="text-center"><b><?php echo $coccup3 ?></b></td>
                                <td class="text-center"><b><?php echo $cfull_khmer4 ?></b></td>
						        <td class="text-center"><b><?php echo $full_english4 ?></b></td>
						        <td class="text-center"><b><?php echo $dob_c4 ?></b></td>
						        <td class="text-center"><b><?php echo $coccup4 ?></b></td>
                                <td class="text-center"><b><?php echo $cfull_khmer5 ?></b></td>
						        <td class="text-center"><b><?php echo $full_english5 ?></b></td>
						        <td class="text-center"><b><?php echo $dob_c5 ?></b></td>
						        <td class="text-center"><b><?php echo $coccup5 ?></b></td>
                                <td class="text-center"><b><?php echo $pbonus ?></b></td>
						        <td class="text-center"><b><?php echo $band ?></b></td>
						        <td class="text-center"><b><?php echo $modifi ?></b></td>
						        <td class="text-center"><b><?php echo $remark ?></b></td>
						        <td class="text-center"><b><?php echo $contract_type ?></b></td>
						        <td class="text-center"><b><?php echo $cd_date ?></b></td>
						        <td class="text-center"><b><?php echo $cmovement ?></b></td>
						        <td class="text-center"><b><?php echo $drecord ?></b></td>
						        <td class="text-center"><b><?php echo $pp_month ?></b></td>
						        <td class="text-center"><b><?php echo $cpro_date ?></b></td>
						        <td class="text-center"><b><?php echo $lstarting_date ?></b></td>
						        <td class="text-center"><b><?php echo $lseniority ?></b></td>
                                <td class="text-center"><b><?php echo $s_period ?></b></td>
						        <td class="text-center"><b><?php echo $working_day ?></b></td>
						        <td class="text-center"><b><?php echo $ror ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
        <div class="col-8">
            <h3 class="text-center"><b>Employee Records</b></h3>
        </div>
        <div class="col-2"></div>
    </div>
</noscript>
<script>
    function toggleFamilyFields() {
        var maritalStatus = document.getElementById("marital_status").value;
        var familyFieldsDiv = document.getElementById("family_fields");

        if (maritalStatus === "Single") {
            familyFieldsDiv.style.display = "none"; // Hide the family fields
        } else {
            familyFieldsDiv.style.display = "block"; // Show the family fields
        }
    }
</script>
<script>
    $(function() {
        $('#print').click(function(){
            start_loader();
            var _h = $('head').clone();
            var _p = $('#outprint').clone();
            var _ph = $($('noscript#print-header').html()).clone();
            var _el = $('<div>');
            _p.find('tr.bg-gradient-dark').removeClass('bg-gradient-dark');
            _p.find('tr>td:last-child,tr>th:last-child,colgroup>col:last-child').remove();
            _p.find('.badge').css({'border':'unset'});
            _el.append(_h);
            _el.append(_ph);
            _el.find('title').text('Employee Records - Print View');
            _el.append(_p);


            var nw = window.open('','_blank','width=1000,height=900,top=50,left=200')
            nw.document.write(_el.html())
            nw.document.close()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 300);
           }, (750));
        });
    });
    function delete_employee($id){
		start_loader();
		$.ajax({
			url:'ajax.php?action=delete_employee',
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err);
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.href="./?page=employee_list";
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		});
	}
</script>
