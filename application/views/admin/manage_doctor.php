<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo ('Edit Doctor');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo ('Doctor List');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo ('Add Doctor');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
        	<?php if(isset($edit_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_profile as $row):?>
                    <?php echo form_open('admin/manage_doctor/edit/do_update/'.$row['doctor_id'] , array('class' => 'form-horizontal validatable'));?>
	             <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Address');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Phone');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Department');?></label>
                                <div class="controls">
                                    <select name="department_id" class="uniform" style="width:100%;">
                                    	<?php 
										$departments = $this->db->get('department')->result_array();
										foreach($departments as $row2):
										?>
                                    		<option value="<?php echo $row2['department_id'];?>"
                                            	<?php if($row['department_id'] == $row2['department_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                   	        </option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Profile');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="profile" value="<?php echo $row['profile'];?>"/>
                                </div>
                            </div>
          </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo ('Save Doctor');?></button>
                        </div>
                    <?php echo form_close();?>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>

            <!----EDITING FORM ENDS--->

            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo ('Doctor Name');?></div></th>
                    		<th><div><?php echo ('Department');?></div></th>
                    		<th><div><?php echo ('Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($doctors as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?admin/manage_doctor/edit/<?php echo $row['doctor_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Edit');?>" class="btn btn-primary">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?admin/manage_doctor/delete/<?php echo $row['doctor_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Delete');?>" class="btn btn-danger">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->

			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/manage_doctor/create/' , array('class' => 'form-horizontal validatable'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Address');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Phone');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="phone"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Department');?></label>
                                <div class="controls">
                                    <select name="department_id" class="uniform" style="width:100%;">
                                    	<?php 
										$departments = $this->db->get('department')->result_array();
										foreach($departments as $row):
										?>
                                    		<option value="<?php echo $row['department_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Profile');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="profile"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><?php echo ('Add Doctor');?></button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>

			<!----CREATION FORM ENDS--->

            

		</div>

  </div>

</div>
    
</div>
