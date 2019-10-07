(function(){

	var contactedModal = new Modal({
		btnOpen: '',
		modalId: 'lb-modal--mark-contacted',
		btnSave: '#modal-mark-contacted',
		beforeOpen: function(done){

			console.log(this.getData());
			done();
			
		},
		saveChanges: function(done){

		}
	});

	$('input[type="checkbox"]').on('click', function(){
		if($(this).prop('checked')){

			$('#respone-form').attr('action', 'contacts/' + $(this).data('id') + '/response');
			// change contacted
			contactedModal.openModal();

		}else{

			// change contacted

		}
		
	});

})();