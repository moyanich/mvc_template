<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
               <h4 class="page-title"><?php echo $data['title']; ?></h4>
               <p><?php echo $data['description']; ?></p>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<div class="row gutters-sm">
    <div class="col-md-12 mb-3">
        <div class="card card-profile emp-profile">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2 profile__img">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    </div>
                    <div class="col-12 col-md-5 my-3">
                        <div class="profile__info">
                            <h4 class="font-weight-bold"><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></h4>
                            <ul class="profile_lists">
                                <li>
                                    <div class="title">Employee ID:</div>
                                    <div class="text"><?php echo $data['empID']; ?></div>
                                </li>
                                <li>
                                    <div class="title">Hire Date:</div>
                                    <div class="text"><?php echo $data['hire_date']; ?></div>
                                </li>

                                <li>
                                    <div class="title">Email Address (Company):</div>
                                    <div class="text"><a class="link" href="mailto:<?php echo $data['internalEmail']; ?>"><?php echo $data['internalEmail']; ?></a></div>
                                </li>
                                <li>
                                    <div class="title">Job Title</div>
                                    <div class="text"><?php echo $job = !empty($data['job']) ? $data['job'] : '' ;?></div>
                                </li>
                                <li>
                                    <div class="title">Department:</div>
                                    <div class="text"><?php echo $name = !empty($data['name']) ? $data['name'] : ''; ?></div>
                                </li>
                                <li>
                                    <div class="title">Reports to:</div>
                                    <div class="text">
                                        <div class="avatar-box">
                                            <div class="avatar avatar-xs"><i class="fas fa-user-alt"></i></div>
                                        </div>
                                        <a href="profile.html"> NAME </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 my-3">
                        <ul class="profile_lists">
                            <li>
                                <div class="title">Gender:</div>
                                <div class="text"><?php echo $data['gender']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">TRN:</div>
                                <div class="text"><?php echo $data['trn']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">NIS:</div>
                                <div class="text"><?php echo $data['nis']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">Phone:</div>
                                <div class="text"><?php echo $data['phoneOne']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">Mobile Phone:</div>
                                <div class="text"><?php echo $data['mobile']; ?></div>
                            </li>
                            <li>
                                <div class="title">Email (Personal):</div>
                                <div class="text"><a href="mailto:<?php echo $data['externalEmail']; ?>"><?php echo $data['externalEmail']; ?></a></div>
                            </li>
                            <li>
                                <div class="title">D.O.B.:</div>
                                <div class="text"><?php echo date("F j, Y", strtotime($data['empDOB'])); ?></div>
                            </li>
                            <li>
                                <div class="title">Age:</div>
                                <div class="text"><?php echo $data['empAge']; ?> years</div>
                            </li>
                            <li>
                                <div class="title">Retirement Date:</div>
                                <div class="text"><?php echo date("F j, Y", strtotime($data['retirement'])); ?></div>
                            </li>
                            <li>
                                <div class="title">Address:</div>
                                <div class="text"><?php echo $data['address']; ?></div>
                            </li>
                            <li>
                                <div class="title">City:</div>
                                <div class="text"><?php echo $data['city']; ?></div>
                            </li>
                            <li>
                                <div class="title">Parish:</div>
                                <div class="text"><?php echo $data['parish']; ?></div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .row -->
                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/edit/<?php echo $data['empID'] ?>" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>
</div>

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
                <div class="emp-edit"><a href="<?php // echo URLROOT ?>/employees/edit/<?php //echo $data['id'] ?>#compForm" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>

    <div class="col-md-8 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Employment History</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="deptTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">Department</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($data['fullJobHistory'] as $jobs) {
                            echo '<tr>';
                                echo '<td>' . $title = !empty($jobs->title ) ? $jobs->title  : '' . '</td>';
                                echo '<td>' . $jobs->name . '</td>';
                                echo '<td>' . $jobs->from_date . '</td>';
                                echo '<td>' . $jobs->to_date . '</td>';
                                echo '<td class="actions"><a href="' . URLROOT. '/employees/editjob/' . $jobs->id . '" class="mr-3"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#delJobModal-' . $jobs->id . '"><i class="far fa-trash-alt"></i></a></td>'; 
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/jobs/<?php echo $data['empID'] ?>" type="button" class="edit-icon"><i class="fas fa-plus"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/edit/<?php echo $data['empID'] ?>#compForm" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>
</div>


<!-- Modal Delete Job -->
<?php foreach ($data['fullJobHistory'] as $job) { ?>
    <div class="modal custom-modal fade" id="delJobModal-<?php echo $job->id; ?>" tabindex="-1" aria-labelledby="delJobModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <p>Are you sure want to Delete the Position?</p>
                        <h6 class="text-muted text-uppercase">ID: <?php echo $job->id; ?></h6>
                        <h4><?php echo $job->title; ?></h4>
                        <h6 class="text-muted text-uppercase">in Department</h6>
                        <h4><?php echo $job->name; ?></h4>
                    </div>
                    <div class="modal-buttons delete-action">
                        <div class="row">
                            <div class="col-6">
                                <form action="<?php echo URLROOT; ?>/employees/deletejob/<?php echo $job->id ?>" method="post">
                                    <input type="hidden" name="empNo" value="<?php echo $data['empID']; ?>">
                                    <input type="submit" value="Delete" class="btn btn-warning del-btn modal-btn">
                                </form>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn modal-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>



