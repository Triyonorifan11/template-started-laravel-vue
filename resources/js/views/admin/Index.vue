<template>
	
	<!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <app-admin-sidebar></app-admin-sidebar>
            
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <app-admin-navbar></app-admin-navbar>
					
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <router-view class="router-admin"></router-view>
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
</template>

<script>
import appAdminNavbar from '@/components/templates/Navbar.vue';
import appAdminSidebar from '@/components/templates/Sidebar.vue';
export default {
	components: {
		appAdminNavbar,
		appAdminSidebar,
	},
	data() {
		return {

		}
	},
	mounted() {
		setTimeout(function () {
			let scriptTag = document.createElement('script');
			scriptTag.src = assetUrl + `assets/js/init-metronic.js`;
			$('#script-metronic').append(scriptTag);
			reinitializeAllPlugin();
		}, 200);
	},
	methods: {

	}
}
</script>

<style type="text/css" scoped>
/* *{
        font-family: 'Poppins', sans-serif;
    }
    .btn-orange{
        background-color:orange !important;
        color:white;
    }
    .btn-orange:hover{
        background-color:rgb(227, 150, 5) !important;
        color:white;
    }
    .text-orange{
        color:orange !important;
    }
    .bg-orange{
        background-color:orange !important;
    } */
</style>
