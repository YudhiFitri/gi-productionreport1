<!--add bundle modal-->
<div class="modal fade" id="modal_add_bundle" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="bundle_title">Add Bundle</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-add_bundle">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<!-- <input type="hidden" name="id_barang" id="id_barang"> -->
								<label>Size: </label>
								<!-- <input type="text" id="no_inventaris" name="no_inventaris" class="form-control"> -->
								<select id="size" name="size" class="select2 form-control" style="width: 100%" data-placeholder="Select a size"></select>
							</div>

							<div class="form-group">
								<label>PCS EACH BUNDLE: </label>
								<input type="number" id="pcs_each_bundle" name="pcs_each_bundle" class="form-control">
							</div>

							<div class="form-group">
								<label>QTY: </label>
								<input type="number" id="qty_modal" name="qty_modal" class="form-control">
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>
										<input type="checkbox" class="no_mold" id="no_mold" name="no_mold">
										Bra Without Mold
									</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>
										<input type="checkbox" class="outer_mold" id="outer_mold" name="outer_mold">
										Outer Mold
									</label>
								</div>
							</div>


							<div class="col-md-4">
								<div class="form-group">
									<label>
										<input type="checkbox" class="mid_mold" id="mid_mold" name="mid_mold">
										Mid Cover Mold
									</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>
										<input type="checkbox" class="linning_mold" id="linning_mold" name="linning_mold">
										Linning Mold
									</label>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>
										<input type="checkbox" class="panty" id="panty" name="panty">
										Panty
									</label>
								</div>
							</div>

							<div class="form-group">
								<label>TOTAL BUNDLE'S QTY: </label>
								<input type="number" id="total_bundle_qty" name="total_bundle_qty" class="form-control col-sm-6" disabled>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btnCreateBundle">Create Bundle</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end add bundle modal-->

<!--show bundle modal-->
<div class="modal fade" id="modal_show_bundle" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Show Bundle</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-show-bundle">
				<div class="modal-body">
					<div class="row">
						<table id="showBundleTable" class="table table-border table-striped" width="100%">
							<thead>
								<th>#</th>
								<th>SIZE</th>
								<th>QTY</th>
								<th>NO BUNDLE</th>
							</thead>
							<tfoot>
								<th>#</th>
								<th>SIZE</th>
								<th>QTY</th>
								<th>NO BUNDLE</th>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end show bundle modal-->

<!--show cutting done modal-->
<div class="modal fade modal-info" id="modal_cutting_done" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Show Bundle</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-modal-cutting-done">
				<div class="modal-body">
					<div class="row">
						<table id="showCuttingDoneTable" class="table table-border table-striped" width="100%" autoWidth="true">
							<thead>
								<th>#</th>
								<th>SIZE</th>
								<th>QTY</th>
								<th>NO BUNDLE</th>
								<th>CUTTING DATE</th>
								<!-- <th>Actions</th> -->
							</thead>
							<tfoot>
								<th>#</th>
								<th>SIZE</th>
								<th>QTY</th>
								<th>NO BUNDLE</th>
								<th>CUTTING DATE</th>
								<!-- <th>Actions</th> -->
							</tfoot>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btnSaveSelected" class="btn btn-success"><i class="fa fa-checked"></i> Save Selected</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end cutting done modal-->

<!--scan bundle modal cutting-->
<div class="modal fade" id="modal_show_scan_bundle" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Please Scan Bundle Record</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-show-scan-bundle">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Barcode</label>
						<div class="col-md-10">
							<input type="text" id="barcode" class="form-control" tabindex="0" maxlength="20">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end scan bundle modal cutting-->

<!-- scan bundle record input molding-->
<div class="modal fade" id="modal_show_scan_bundle_for_molding" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Please Scan Bundle Record</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-show-scan-bundle-for-molding">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Barcode</label>
						<div class="col-md-10">
							<input type="text" id="barcode_input_molding" class="form-control" maxlength="20">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end scan bundle record input molding-->

<!--output sewing man power modal-->
<div class="modal show" id="modal_man_power" name="modal_man_power" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo $this->session->userdata['username']; ?> Line Man Power</h4>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button> -->
			</div>
			<form method="POST" id="form-man-power">
				<div class="modal-body">
					<!-- <div class="form-group row">
						<label class="col-md-4 col-form-label">Center Panel MP: </label>
						<div class="col-md-4">
							<input type="number" id="center_panel_op" name="center_panel_op" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Back Wings MP: </label>
						<div class="col-md-4">
							<input type="number" id="back_wings_op" name="back_wings_op" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Cups MP: </label>
						<div class="col-md-4">
							<input type="number" id="cups_op" name="cups_op" class="form-control">
						</div>
					</div> -->

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Assembly MP: </label>
						<div class="col-md-4">
							<input type="number" id="assembly_op" name="assembly_op" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
					<!-- <button type="button" id="btnSaveMP" class="btn btn-success" data-dismiss="modal">Save</button> -->
					<button type="submit" id="btnSaveMP" class="btn btn-success">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end output sewing man power modal-->

<!--edit qty output sewing modal-->
<div class="modal fade" id="modal_edit_qty" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">QTY Output Sewing</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<form method="post" id="form-edit-qty">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Qty: </label>
						<div class="col-md-10">
							<input type="number" id="qtyOutputSewing" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSaveQtyOutputSewing" class="btn btn-success"> <i class="fa fa-check"></i> OK</button>
					<button type="button" id="btnCancelQtyOutputSewing" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end of edit qty output sewing modal-->
