import ScanningBarcode from '../myClasses/ScanningBarcode.js';

export default function AppScanningBarcode(barcode) {
	const scanningBarcode = new ScanningBarcode(barcode);
	var barcodeLength = scanningBarcode.barcodeLength;
	var barcodePrefix = scanningBarcode.barcodePrefix;

	localStorage.removeItem('firstBarcode');
	localStorage.setItem('firstBarcode', barcode);
	
	// if(barcodeLength <= 12){
		//jika jml karakter barcode kurang atau sama dengan 12, maka itu barcode selain utk sewing
		window.open('./Mekanik', '_self');
		
	// }else{
		//jika jml karakter barcode lebih dari 12, maka itu barcode utk sewing
	// }

	
}



