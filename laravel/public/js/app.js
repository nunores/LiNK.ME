// This files has functions that may be used by all other javascript files
// Make sure to porperly comment this file for it will be used by everyone

// host of the site, ex: http://localhost:8000
const host = location.href.split(location.pathname)[0];

/**
 *  This functions transforms an java object in ajax
 * @param {Object} data
 * @returns object encoded for ajax
 */
const encodeForAjax = (data) => {
	return Object.keys(data).map(function (k) {
		return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
	}).join('&')
}

/**
 *
 * @param {String} method the method to use {GET, POST, PUT, DELETE}
 * @param {String} relative_url the url after the base, ex: /post/1
 * @param {Object} parameters the object to send on the call
 * @param {Function} onLoadFunction Function to be called after load
 */
function AJAX(method, relative_url, parameters, onLoadFunction) {
    const request = new XMLHttpRequest();
    request.addEventListener("load", onLoadFunction);
    request.open(method, host + relative_url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax(parameters));
}

