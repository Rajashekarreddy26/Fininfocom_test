<?php
	if (isset($todo_lists) and !empty($todo_lists)) {
		foreach ($todo_lists as $key => $list) { ?>
			<div class="card mt-3 form-outline">
				<div class="card-body">
					<div class="table table-responsive mb-0">
						<table class="table table-boarderless mb-0">
							<tr>
								<td class="text-center"><?php print $list['title']; ?></td>
							</tr>
							<tr>
								<td><?php print date('M. d, Y, h:i a', strtotime($list['date'])); ?></td>
							</tr>
							<tr style="border:transparent;">
								<td><?php print $list['details']; ?></td>
							</tr>
							<tr style="border:transparent;">
								<td class="text-end">
									<button class="btn btn-success btn-sm" onclick="taskEdit(<?php print $list['id']; ?>)"><i class="fa fa-pencil">&nbsp;</i>Edit</button>
									<button class="btn btn-primary btn-sm" onclick="taskDelete(<?php print $list['id']; ?>)"><i class="fa fa-trash">&nbsp;</i>Remove</button>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		<?php
		}
	}
	else { ?>
		<div class="form-outline p-3 mt-3">
			<div class="alert alert-warning mb-0"> No records found.</div>
		</div>
	<?php
	}
?>
