/**
 * Copyright (C) 2023 POLYXGO
 *
*/
document.addEventListener("DOMContentLoaded", function () {
	jQuery(document).ready(function ($) {
		'use strict'; // Idea

		console.log('Init My Plugin /util.js');

		// ======== jQuery UI Draggable JS ======== //
		// Document: https://jqueryui.com/draggable/
		$(".modal").draggable({
			handle: ".modal-header",
		});
		// ======== //jQuery UI Draggable JS ======== //

		// ======== Bootstrap 5.3.* JS ======== //
		// Document: https://getbootstrap.com/docs/5.3/getting-started/introduction/
		// ######## Bootstrap Toast JS ######## //
		console.log('Init Toast by Bootstrap');
		const toastTrigger = document.getElementById('liveToastBtn');
		const toastLiveExample = document.getElementById('liveToast');

		if (toastTrigger) {
			const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
			toastTrigger.addEventListener('click', () => {
				toastBootstrap.show();
			})
		}
		// ######## //Bootstrap Toast JS ######## //

		// ######## Bootstrap Tooltip ######## //
		console.log('Init Tooltip by Bootstrap');
		const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
		const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
		// ######## //Bootstrap Tooltip ######## //

		// ######## Bootstrap Popovers ######## //
		console.log('Init Popovers by Bootstrap');
		const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
		// ######## //Bootstrap Popovers ######## //

		// ======== //Bootstrap 5.3.* JS ======== //

		// ======== Select2 ======== //
		// Document: https://select2.org/
		$('.js-example-basic').select2({
			placeholder: 'Select an option'
		});
		// ======== //Select2 ======== //

		// ======== Sortable ======== //
		// Document: https://select2.org/
		if (myListItem && myListItem !== undefined && myListItem !== 'undefined') {
			new Sortable(myListItem, {
				handle: '.handle', // handle's class
				multiDrag: true, // Enable multi-drag
				selectedClass: 'selected',
				filter: '.layer-locked',
				fallbackTolerance: 3, // So that we can select items on mobile
				animation: 150
			});
		}

		// ======== //Sortable ======== //

		// ======== Example code Click element Display SweetAlert2 ======== //
		// Document: https://sweetalert2.github.io/
		// ######## Sample SweetAlert2 ######## //
		jQuery(document).on('click', '.btn-sweetalert2', function (eve) {
			Swal.fire(
				'The Internet?',
				'That thing is still around?',
				'question'
			);
		});
		// ######## //Sample SweetAlert2 ######## //

		// ######## Call + Fetch API SweetAlert2 ######## //
		jQuery(document).on('click', '.btn-sweetalert2-call-api', function (eve) {
			(async () => {
				const contentDiv = document.createElement('div');
				contentDiv.id = 'swal-content';
				contentDiv.innerHTML = '<div class="spinner-border text-primary" role="status">' +
					'<span class="visually-hidden">Đang xử lý...</span>' +
					'</div>';
				// Loading
				const swalInstance = Swal.fire({
					title: 'Đang xử lý...',
					html: contentDiv,
					allowOutsideClick: false,
					allowEscapeKey: false,
					showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: 'Yes...',
					confirmButtonColor: '#3085d6',
					denyButtonText: `Don't...`,
					denyButtonColor: '#d33',
					didOpen: () => {
						Swal.disableButtons();
						//Swal.showLoading();//Default SweetAlert2 loading...
					}
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Selected YES!', '', 'success')
					} else if (result.isDenied) {
						Swal.fire(`Selected DON'T`, '', 'alert')
					}
				});

				// Fetch data
				const branchAPI = 'https://data.polyxgo.com/api/v1/products?si=10&p=&s=thegioididong';
				let restHTML = '';
				try {
					const response = await fetch(branchAPI);
					const data = await response.json();
					const dataObjects = data.data;

					dataObjects.forEach(dataObject => {
						restHTML = restHTML + `<div><a href="${dataObject.l}" rel="nofollow" target="_blank">${dataObject.t}</a></div>`;
					});
				} catch (error) {
					console.error('Error:', error);
				}
				// Update content
				contentDiv.innerHTML = restHTML;
				Swal.update({
					title: '<strong>Data <u>Rest from API</u></strong>',
					icon: 'info',
					showCancelButton: true,
				});

				// Hide loading when using Swal.showLoading()
				//Swal.hideLoading();
				Swal.enableButtons();
			})();
		});
		// ######## //Call + Fetch API SweetAlert2 ######## //
		// ======== Example code Click element Display SweetAlert2 ======== //

		// ======== Example code use Promise order by functions; ======== //
		const firstFunctionPromise = () => {
			return new Promise(function (resolve, reject) {
				console.log('==> Run 1 (promise)');
				setTimeout(function () {
					console.log('====> Run 1 (promise): Wait 1 seconds then continue...');
					resolve();
				}, 1000);
			});
		}
		const secondFunctionPromise = () => {
			return new Promise(function (resolve, reject) {
				console.log('==> Run 2 (promise)');
				let _isLogicTest = true;
				if (_isLogicTest) {
					setTimeout(function () {
						console.log('====> Run 2 (promise): Wait 1 seconds then continue...');
						resolve('Thành công!');
					}, 1000);
				} else {
					reject('Thất bại!');
				}
			});
		}
		// Call by order index 1 -> 2 -> 3
		firstFunctionPromise()
			.then(secondFunctionPromise)
			.then(function (result) {
				console.log('==> Promise 1-2 đã hoàn tất với kết quả:', result);
				lastFunctionPromise();
			}).catch(function (result) {
				console.error(`==> Promise bị từ chối với lỗi: ${result}`);
			});
		const lastFunctionPromise = () => {
			console.log('==> Run 3 (promise)');
		}
		// ======== //Example code use Promise order by functions ======== //
	});
});