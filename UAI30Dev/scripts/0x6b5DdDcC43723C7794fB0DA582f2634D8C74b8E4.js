(function() {
  'use strict';

  var app = {
    isLoading: true,
	
    spinner: document.querySelector('.loader'),
  
    container: document.querySelector('.main'),
   
   
  };


  /*****************************************************************************
   *
   * Event listeners for UI elements
   *
   ****************************************************************************/

  
 document.getElementById('butConnect').addEventListener('click', function() {
    // Refresh all of the forecasts
    console.log('bottonClick connect do connect');
	app.bluetoothConnect();
  });
  
  document.getElementById('butListen').addEventListener('click', function() {
    // Refresh all of the forecasts
    console.log('butListen listen');
	app.listen();
  });
   




  /*****************************************************************************
   *
   * Methods to display/update/refresh the UI
   *
   ****************************************************************************/



app.updatePage = function() {
	//app.container.querySelector('.top').textContent = "top";
	//app.container.querySelector('.middle').textContent = "middle";
	//app.container.querySelector('.bottom').textContent = "bottom";
	
    if (app.isLoading) {
      app.spinner.setAttribute('hidden', true);
      app.container.removeAttribute('hidden');
      app.isLoading = false;
    }
};
app.bluetoothConnect = function() {
    console.log('Requesting Bluetooth Device...');
    navigator.bluetooth.requestDevice(
        {
            acceptAllDevices: true,
           
        })
        .then(device => {
            console.log('> Found ' + device.name);
            console.log('Connecting to GATT Server...');
            device.addEventListener('gattserverdisconnected', onDisconnected)
            return device.gatt.connect();
        })
        .then(server => {
            console.log('Getting Service 0xffe5 - Light control...');
            return server.getPrimaryService(0xffe5);
        })
        .then(service => {
            console.log('Getting Characteristic 0xffe9 - Light control...');
            return service.getCharacteristic(0xffe9);
        })
        .then(characteristic => {
            console.log('All ready!');
            ledCharacteristic = characteristic;
            onConnected();
        })
        .catch(error => {
            console.log('Argh! ' + error);
        });
}
app.listen = function() {
    annyang.start({ continuous: true });
}


  /*****************************************************************************
   *
   * Methods for dealing with the model
   *
   ****************************************************************************/


app.updatePage();


})();
