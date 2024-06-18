<div id="permissions">
    <h4>Permissions</h4>
    <hr>

    <div id="permissionsContrainer" class="col-md-8">
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Dashboard</p>
                </div>
                    <div class="col-md-3">
                    <input type="checkbox" data-value="./index.php?page=home" name="permissions[dashboard][home]">View
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Employees</p>
                </div>
                    <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=new_employee" name="permissions[employees][new_employee]">Add New
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=employee_list" name="permissions[employees][employee_list]">Employee List
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Department</p>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=department" name="permissions[department][department]">View
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Leave</p>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=new_leave" name="permissions[leave][new_leave]">Add New
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=leave_list" name="permissions[leave][leave_list]">List
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Resignation</p>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=new_resign" name="permissions[resignation][new_resign]">Add New
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=resign_list" name="permissions[resignation][resign_list]">List
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>Hardship</p>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=new_hardship" name="permissions[hardship][new_hardship]">Add New
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=hardship_list" name="permissions[hardship][hardship_list]">List
                    </div>
            </div>
        </div>
        <div class="permission">
            <div class="row">
                <div class="col-md-2">
                <p>History Record</p>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" data-value="./index.php?page=employee_records" name="permissions[employee_records]">Employee Records
                    </div> 
                    <div class="col-md-2"> 
                    <input type="checkbox" data-value="./index.php?page=leave_records" name="permissions[leave_records]">Leave Records
                    </div> 
                    <div class="col-md-2"> 
                    <input type="checkbox" data-value="./index.php?page=resignation_records" name="permissions[resignation_records]">Resignation Records
                    </div> 
                    <div class="col-md-2"> 
                    <input type="checkbox" data-value="./index.php?page=hardship_records" name="permissions[hardship_records]">Hardship Records
                    </div>
            </div>
        </div>
        </div>
</div>