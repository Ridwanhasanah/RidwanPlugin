<?php
//cara membuat metabox
//https://developer.wordpress.org/reference/functions/add_meta_box/
function dwwp_add_custom_metabox(){

	add_meta_box(
		'dwwp_meta', //$id gunakan atribute id unutk memtabox (buat sendiri id nya bebas)
		'Job Listing', //$title  title meta box
		'dwwp_meta_callback', 
		'job', //$screen sesuaikan saja dengan register_post_type('job',$args); ambil karakter job nya. ini ada di wp-job-cpt.php
		'normal', //$context untuk mengatur tmpat metaboox 'side' atau 'normal' atau 'advance'
		'high' //$priority Prioritas dalam konteks di mana kotak harus diletakan 'high' atau 'low'
		);
} 


add_action('add_meta_boxes','dwwp_add_custom_metabox');

//membuat meta box manual
function dwwp_meta_callback( $post){
	wp_nonce_field(basename(__FILE__), 'dwwp_jobs_nonce');
	$dwwp_stored_meta = get_post_meta($post->ID);
	/*var_dump($dwwp_stored_meta);
	die() untuk melihat soucre*/ 
	?>
	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="job-id" class="dwwp-row-title">Job ID</label>
			</div>
			<div class="meta-td">
				<input type="text" name="job_id" id="job-id" value="<?php if(!empty($dwwp_stored_meta['job_id'])) 
				echo esc_attr($dwwp_stored_meta['job_id'][0]);?>"/>
			</div>
		</div>


		<div class="meta-row">
			<div class="meta-th">
				<label for="date-listed" class="dwwp-row-title">Date Listed</label>
			</div>
			<div class="meta-td">
				<input type="text" name="date_listed" id="date-listed" value="<?php if(!empty($dwwp_stored_meta['date_listed'])) 
				echo esc_attr($dwwp_stored_meta['date_listed'][0]);?>"/>
			</div>
		</div>


		<div class="meta-row">
			<div class="meta-th">
				<label for="application-deadline" class="dwwp-row-title">Application Deadline</label>
			</div>
			<div class="meta-td">
				<input type="text" name="application_deadline" id="application_deadline" value=""/>
			</div>
		</div>


	</div>

	<div class="meta">
		<div class="meta-th">
			<span>Principle Duties</span>
		</div>
	</div>
	<div class="meta-editor"></div>
	<?php
	$content = get_post_meta( $post->ID ,'principle_duties',true); //$post->ID tidak tw bersal dari mana dan error 
	//$content konten awal untuk editor
	$editor = 'principle_duties'; 
	/*$editor HTML id nilai atribut untuk textarea dan TinyMCE. (Hanya dapat berisi huruf kecil dan garis bawah ... tanda hubung akan menyebabkan editor untuk tidak ditampilkan dengan benar)
Default: Tidak ada*/
	$settings = array(
		'textarea_rows' => 8, //tempat text baris 1-.... terserah mw tampilannya berapa baris
		'media_buttons' => false //Apakah untuk menampilkan media insert / tombol Upload Default: true

		);

	wp_editor($content, $editor, $settings);
	//wp_ediotr(); Fungsi ini membuat editor di halaman dalam mode khas digunakan dalam Pos dan Pages
	//https://codex.wordpress.org/Function_Reference/wp_editor
	?>
	</div>
	<div class="meta-row">
		<div class="meta-th">
			<label for="minimum-requirements" class="dwwp-row-title">Minimum Requirement</label>
		</div>
		<div class="meta-td">
			<textarea name="minimum_requirements" class="dwwp-textarea" id="minimum-requirements"></textarea>
		</div>
	</div>
	<div class="meta-row">
		<div class="meta-th">
			<label for="prefred-requirements" class="dwwp-row-title">Prefred Requiments</label>
		</div>
		<div class="meta-td">
			<textarea name="prefred_requirements" class="dwwp-textarea" id="prefred-requirements"></textarea>
		</div>
	</div>
	<div class="meta-row">
		<div class="meta-th">
			<label for="relocation-asistance" class="dwwp-row-title">Relocation Assistance</label>
		</div>
		<div class="meta-td">
			<select name="relocation_asistance" id="relocation-asistance">
				<option value="select-yes">Yes</option>';
				<option value="select-no">No</option>';
			</select>
		</div>
	</div>

	<?php
}

function dwwp_meta_save($post_id){
	//Cheks save status
	$is_autosave = wp_is_post_autosave($post_id); //$post_id variable ini tidak d deklarasikan tapi di panggil aneh ????
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['dwwp_jobs_nonce']) && wp_verify_nonce($_POST['dwwp_jobs_nonce'],
		basename(__FILE__)))? 'true' : 'false' ;

	//exist srcipt depending on save status
	if($is_autosave || $is_revision || $is_valid_nonce){
		return;
	}

	if(isset($_POST['job_id'])){
		update_post_meta($post_id, 'job_id', sanitize_text_field($_POST['job_id'] ) );

	}
	if(isset($_POST['date_listed'])){
		update_post_meta($post_id, 'date_listed', sanitize_text_field($_POST['date_listed'] ) );

	}
	if(isset($_POST['principle_duties'])){
		update_post_meta($post_id, 'principle_duties', sanitize_text_field($_POST['principle_duties'] ) );

	}
}

add_action( 'save_post','dwwp_meta_save' );
?>