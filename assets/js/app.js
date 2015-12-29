Number.prototype.modulo = function(n) {
	var m = (( this % n) + n) % n;
	return m < 0 ? m + Math.abs(n) : m;
};

function hexdec(hex) {
	hex = (hex + '').replace(/[^a-f0-9]/gi, '');
	return parseInt(hex, 16);
}

function substr_replace(str, replace, start, length) {
	if (start < 0) {
		start = start + str.length;
	}
	length = length !== undefined ? length : str.length;
	if (length < 0) {
		length = length + str.length - start;
	}
	return str.slice(0, start) + replace.substr(0, length) + replace.slice(length) + str.slice(start + length);
}

function value(key) {
	return document.querySelector('[name='+key+']').value;
}

function option(key) {
	return + document.querySelector('[name='+key+']').checked;
}

function selectResult() {
	document.querySelector('textarea').select();
}

function generate() {
	var hash = CryptoJS.SHA256(value('public_key') + value('private_key') + value('length')).toString(),
		charsets = {},
		index = 0,
		pass = '',
		reserved = 0;

	if(option('lowercases')) {
		reserved++;
		charsets['lowercases'] = 'tdnbeisrvmlawgfckxyhjzpuqo';
	}
	if(option('uppercases')) {
		reserved++;
		charsets['uppercases'] = 'FWRTIEBAVUCMGZOXDKHNJYPQSL';
	}
	if(option('digits')) {
		reserved++;
		charsets['digits'] = '3876415290';
	}
	if(option('symbols')) {
		reserved++;
		charsets['symbols'] = '*],=}~&|>+%/.@$_?<:[!){^;#(';
	}

	if(reserved == 0) {
		return false;
	}

	for (var prog = 0; prog < value('length') - reserved; prog++) {
		charset = charsets[Object.keys(charsets)[hexdec(hash[index++]).modulo(Object.keys(charsets).length)]];
		character = charset[hexdec(hash[index++]).modulo(charset.length)];
		pass += character;
	}

	if(option('lowercases')) {
		var position = hexdec(hash[index++]).modulo(pass.length + 1);
		character = charsets.lowercases[hexdec(hash[index++]).modulo(charsets.lowercases.length)];
		pass = substr_replace(pass, character, position, 0);
	}
	if(option('uppercases')) {
		var position = hexdec(hash[index++]).modulo(pass.length + 1);
		character = charsets.uppercases[hexdec(hash[index++]).modulo(charsets.uppercases.length)];
		pass = substr_replace(pass, character, position, 0);
	}
	if(option('digits')) {
		var position = hexdec(hash[index++]).modulo(pass.length + 1);
		character = charsets.digits[hexdec(hash[index++]).modulo(charsets.digits.length)];
		pass = substr_replace(pass, character, position, 0);
	}
	if(option('symbols')) {
		var position = hexdec(hash[index++]).modulo(pass.length + 1);
		character = charsets.symbols[hexdec(hash[index++]).modulo(charsets.symbols.length)];
		pass = substr_replace(pass, character, position, 0);
	}

	document.body.innerHTML = '<textarea readonly>' + pass + '</textarea>';
	document.body.onclick = selectResult;
	document.body.onkeydown = selectResult;
}