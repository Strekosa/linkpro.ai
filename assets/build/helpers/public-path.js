/* eslint-env browser */
/* globals CODESKA_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (CODESKA_DIST_PATH) {
  __webpack_public_path__ = CODESKA_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
