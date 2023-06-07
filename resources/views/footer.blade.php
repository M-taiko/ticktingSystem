	<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>

		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/share-earn.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/type.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/details.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/offer-a-deal/main.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
		<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
	



<!-----------------------ajax -------------------------------------->
<script>
	$(function() {

							function fetchUnreadCount() {
								$.ajax({
									url: '/notifications/unread',
									success: function(data) {
										$('#unread-count').text(data.count);
										console.log(data);
									}
								});
							}

							// Fetch the unread count initially
							fetchUnreadCount();

							// Set interval to periodically update the unread count
							setInterval(fetchUnreadCount, 15000); // 10 seconds
						});
			
</script>
<!--
		<script type="module">
			import Echo from 'laravel-echo';
			window.Pusher = require('pusher-js');

			window.Echo = new Echo({
				broadcaster: 'pusher',
				key: process.env.MIX_PUSHER_APP_KEY,
				cluster: process.env.MIX_PUSHER_APP_CLUSTER,
				encrypted: true,
			});

			window.Echo.channel('example-channel')
				.listen('.example-event', (event) => {
					console.log(event);
					// Handle the event data here
				});

		</script>
		-->
		<!--end::Custom Javascript-->	
		</body>
	<!--end::Body-->


</html>