/**
 * Created by Sefa on 28.07.2014.
 */

/**
 * Url parser
 */
function urlParser(url, type) {

    var id;
    if (type !== 'vimeo') {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[7].length == 11)
            id = match[7];
    }

    else if (matches = url.match(/vimeo.com\/(\d+)/)) {
        id = matches[1];
    }

    if (id == undefined) {
        var regExp = /^([a-zA-Z0-9_-]{6,14})$/;
        var match = url.match(regExp);
        if (match)
            var id = match[0];
    }

    if (id == undefined || !id) {
        return false;
    }
    return id;
}