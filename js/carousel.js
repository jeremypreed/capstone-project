(function(){
	var app = angular.module('cw',['ngSanitize']);
	
	app.directive('carousel', function(){
		return {
			restrict: 'E',
			templateUrl: 'pages/layout/carousel.htm',
			controller: function($interval){
				var vm = this;
				vm.slides = slides;
				vm.speed = 8000;
				vm.tab = 0;
				
				vm.checkTab = function(){
					if (vm.tab > vm.slides.length - 1){ vm.tab = 0; } 
					else if (vm.tab < 0){	vm.tab = vm.slides.length - 1; }
				}

				vm.isSet = function(tab) {
					return vm.tab === tab;
				};

				vm.setTab = function(tab) {
					vm.tab = tab;
					vm.checkTab();
					$interval.cancel(vm.interval);
					vm.autoSwitch();
				};
				
				vm.autoSwitch = function(){	
					vm.interval = $interval(function(){
						vm.tab++;
						vm.checkTab();
					},vm.speed);
				}
				
				vm.autoSwitch();

			},
			controllerAs: 'carousel'
		};
	});
	
	var slides = [
		{
			content: '<div class="text"><span><strong>Shop</strong> til you <strong>drop!</strong></span><br><span><i><strong>Hundreds</strong> of shirts in stock!</i></span></div>',
			image: 'img/carousel/image1.jpg',
			align: 'text-left'
		},
		{
			content: '<div class="text"><span><strong>Summer Collection!</strong></span><br><span><i>All T-Shirts made with <strong>100%</strong> cotton.</i></span></div>',
			image: 'img/carousel/image2.jpeg',
			align: 'text-center'
		},
		{
			content: '<div class="text"><span><strong>Fantastic, Great Stuff!</strong></span><br><span>Everything is <strong>high</strong> quality.</span><br><span><strong>Guaranteed.</strong></span></div>',
			image: 'img/carousel/image3.jpg',
			align: 'text-right'
		},
		{
			content: '<div class="text"><span><strong>Jeans Jubilee!</strong></span><br><span>Take <strong>20% off</strong> all jeans.</span><br><span><i>Limited Time Only!</i></span></div>',
			image: 'img/carousel/image4.jpeg',
			align: 'text-center'
		}
	];
					
})();