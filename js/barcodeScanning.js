var MachineScanningNamespace = MachineScanningNamespace || {}
var SewingScanningNamespace = SewingScanningNamespace || {}

// MachineScanningNamespace
MachineScanningNamespace.MachineScanning = function(barcode){
    this._barcode = barcode;
    // this._machineBreakdown = null;
};

MachineScanningNamespace.MachineScanning.prototype = {
    _getMachineAtBreakdown: function (_barcode) {
        var returnValue;
        $.ajax({
            type: 'GET',
            url: `./Mekanik/ajax_check_machine_breakdown_by_barcode/${_barcode}`,
            dataType: 'json',
        }).done(function (data) {
            returnValue = data;
        });
        return returnValue;
    },
    get getMachineAtBreakdown() {
        return this._getMachineAtBreakdown;
    },
    set getMachineAtBreakdown(value) {
        this._getMachineAtBreakdown = value;
    },

}

