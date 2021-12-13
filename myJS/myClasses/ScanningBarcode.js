export default class ScanningBarcode {
	constructor(barcode) {
		this._barcode = barcode;
		// this.barcodePrefix = barcode.substr(0,2);
	}

	get barcodePrefix() {
		return this._barcode.substr(0, 2);
	}

	get barcodeLength() {
		return this._barcode.length;
	}

	getMechanic() {
		return $.ajax({
			type: 'GET',
			url: `./Mekanik/ajax_get_mekanik_by_barcode/${this._barcode}`,
			dataType: 'json',
		});
	}

	getMachineSymptom(){
		return $.ajax({
			
		})
	}
}
