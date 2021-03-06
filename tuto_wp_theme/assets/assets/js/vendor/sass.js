'use strict';

// istanbul ignore next

var _createDecoratedClass = (function () { function defineProperties(target, descriptors, initializers) { for (var i = 0; i < descriptors.length; i++) { var descriptor = descriptors[i]; var decorators = descriptor.decorators; var key = descriptor.key; delete descriptor.key; delete descriptor.decorators; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor || descriptor.initializer) descriptor.writable = true; if (decorators) { for (var f = 0; f < decorators.length; f++) { var decorator = decorators[f]; if (typeof decorator === 'function') { descriptor = decorator(target, key, descriptor) || descriptor; } else { throw new TypeError('The decorator for method ' + descriptor.key + ' is of the invalid type ' + typeof decorator); } } if (descriptor.initializer !== undefined) { initializers[key] = descriptor; continue; } } Object.defineProperty(target, key, descriptor); } } return function (Constructor, protoProps, staticProps, protoInitializers, staticInitializers) { if (protoProps) defineProperties(Constructor.prototype, protoProps, protoInitializers); if (staticProps) defineProperties(Constructor, staticProps, staticInitializers); return Constructor; }; })();

// istanbul ignore next

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

// istanbul ignore next

var _get = function get(_x2, _x3, _x4) { var _again = true; _function: while (_again) { var object = _x2, property = _x3, receiver = _x4; desc = parent = getter = undefined; _again = false; if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { _x2 = parent; _x3 = property; _x4 = receiver; _again = true; continue _function; } } else if ('value' in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } } };

// istanbul ignore next

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

// istanbul ignore next

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

// istanbul ignore next

function _inherits(subClass, superClass) { if (typeof superClass !== 'function' && superClass !== null) { throw new TypeError('Super expression must either be null or a function, not ' + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var _path = require('path');

var _path2 = _interopRequireDefault(_path);

var _child_process = require('child_process');

var _semver = require('semver');

var _semver2 = _interopRequireDefault(_semver);

var _semverRegex = require('semver-regex');

var _semverRegex2 = _interopRequireDefault(_semverRegex);

var _dargs = require('dargs');

var _dargs2 = _interopRequireDefault(_dargs);

var _through2 = require('through2');

var _through22 = _interopRequireDefault(_through2);

var _concatStream = require('concat-stream');

var _concatStream2 = _interopRequireDefault(_concatStream);

var _which = require('which');

var _which2 = _interopRequireDefault(_which);

var _objectAssign = require('object-assign');

var _objectAssign2 = _interopRequireDefault(_objectAssign);

var _endsWith = require('ends-with');

var _endsWith2 = _interopRequireDefault(_endsWith);

var _memoizeDecorator = require('memoize-decorator');

var _memoizeDecorator2 = _interopRequireDefault(_memoizeDecorator);

var _es6Promise = require('es6-promise');

var _es6Denodeify = require('es6-denodeify');

var _es6Denodeify2 = _interopRequireDefault(_es6Denodeify);

var promiseify = (0, _es6Denodeify2['default'])(_es6Promise.Promise);
var whichp = promiseify(_which2['default']);

var BIN = 'sass-convert';
var MINVERS = '>=3.4.5';

/**
 * Execute command in a child process.
 *
 * @see {@link http://nodejs.org/api/child_process.html}
 * @param {String} command
 * @param {Array} args
 * @return {Promise}
 */
function execp(command) {
  for (var _len = arguments.length, args = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    args[_key - 1] = arguments[_key];
  }

  var childProcess = undefined;

  return new _es6Promise.Promise(function (resolve, reject) {
    args.push(function (err, stdout, stderr) {
      if (err) {
        (0, _objectAssign2['default'])(err, {
          message: err.message + ' `' + command + '` exited with error code ' + err.code,
          stdout: stdout,
          stderr: stderr
        });

        reject(err);
      } else {
        resolve({ childProcess: childProcess, stdout: stdout, stderr: stderr });
      }
    });

    childProcess = _child_process.exec.apply(undefined, [command].concat(args));
  });
}

/**
 * Custom error for binary check.
 *
 * @param {String} message
 */

var BinaryError = (function (_Error) {
  _inherits(BinaryError, _Error);

  function BinaryError(message) {
    _classCallCheck(this, BinaryError);

    _get(Object.getPrototypeOf(BinaryError.prototype), 'constructor', this).call(this, message);
    // http://bit.ly/1yMzARU
    this.message = message || 'Could not find any executable for "' + BIN + '". Operation Aborted.';
  }

  /**
   * Custom error for version check.
   *
   * @param {String} message
   */

  _createClass(BinaryError, [{
    key: 'name',
    get: function get() {
      return 'BinaryError';
    }
  }]);

  return BinaryError;
})(Error);

var VersionError = (function (_Error2) {
  _inherits(VersionError, _Error2);

  function VersionError(message) {
    _classCallCheck(this, VersionError);

    _get(Object.getPrototypeOf(VersionError.prototype), 'constructor', this).call(this, message);
    // http://bit.ly/1yMzARU
    this.message = message || 'Invalid "' + BIN + '" version, must be ' + MINVERS;
  }

  /**
   * Check whether passed binary (Gem) is in $PATH,
   * and check its version.
   *
   * @param {String} bin
   * @return {Promise}
   */

  _createClass(VersionError, [{
    key: 'name',
    get: function get() {
      return 'VersionError';
    }
  }]);

  return VersionError;
})(Error);

function checkBinary(bin) {

  /**
   * Check for binary min-version.
   *
   * @param {String} str
   * @return {Boolean}
   */
  function checkVersion(str) {
    var version = str.match((0, _semverRegex2['default'])())[0];
    return _semver2['default'].satisfies(version, MINVERS);
  }

  /**
   * Check for global binary and version.
   *
   * @return {Promise}
   */
  function checkGlobal() {
    return whichp(bin).then(function () {
      return execp(bin + ' -v');
    }, function () {
      throw new BinaryError();
    }).then(function (res) {
      if (!checkVersion(res.stdout)) {
        throw new VersionError();
      }
    });
  }

  /**
   * Check for bundled binary and version.
   *
   * @return {Promise}
   */
  function checkBundle() {
    return whichp('bundle').then(function () {
      return execp('bundle exec ' + bin + ' -v');
    }).then(function (res) {
      if (!checkVersion(res.stdout)) {
        throw new VersionError();
      }
      return { bundler: true };
    }, function (err) {
      throw new BinaryError();
    });
  }

  return checkBundle()['catch'](checkGlobal);
}

/**
 * Run binary checks only once.
 *
 * @return {Promise}
 */
function checkBinaryCache() {
  if (!('promise' in checkBinaryCache)) {
    checkBinaryCache.promise = checkBinary(BIN);
  }

  return checkBinaryCache.promise;
}

var Converter = (function () {
  function Converter() {
    var options = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

    _classCallCheck(this, Converter);

    this.options = options;
    this.bundler = false;
  }

  /**
   * Format the `sass-convert` command string.
   *
   * @return {Object}
   */

  _createDecoratedClass(Converter, [{
    key: 'isTransformable',

    /**
     * Returns whether file is eligible for convertion.
     *
     * @param {Object} file - Vinyl file Object
     * @return {Boolean}
     */
    value: function isTransformable(file) {
      var ext = _path2['default'].extname(file.path);
      return (file.isBuffer() || file.isStream()) && (0, _endsWith2['default'])(ext, this.options.from);
    }

    /**
     * Convert file Buffer through `sass-convert` binary.
     *
     * @param {Buffer} file - Vinyl file
     * @param {String} enc - encoding
     * @return {Promise}
     */
  }, {
    key: 'convertFile',
    value: function convertFile(file, enc) {
      var _command = this.command;
      var cmd = _command.cmd;
      var args = _command.args;

      var child = (0, _child_process.spawn)(cmd, args);
      var result = {};

      file.pipe(child.stdin);

      child.stdout.pipe((0, _concatStream2['default'])(function (data) {
        result.stdout = data;
      }));

      child.stderr.pipe((0, _concatStream2['default'])(function (data) {
        result.stderr = data;
      }));

      return new _es6Promise.Promise(function (resolve, reject) {
        child.on('error', reject);

        child.on('close', function (code, signal) {
          if (code !== 0) {
            var message = '`' + cmd + ' ' + args.join(' ') + '` failed with code ' + code;
            var stderr = Buffer.isBuffer(result.stderr) ? result.stderr.toString() : '';

            reject({ code: code, message: message, stderr: stderr });
          } else {
            resolve(result);
          }
        });
      });
    }

    /**
     * Change file extension to `options.from`.
     *
     * @param {Object} file - Vinyl file
     */
  }, {
    key: 'rename',
    value: function rename(file) {
      if (!this.options.rename) {
        return;
      }

      var ext = _path2['default'].extname(file.path);
      file.path = file.path.replace(ext, '.' + this.options.to);
    }

    /**
     * Returns a transform stream meant to be piped to a stream
     * of Sass, SCSS or CSS files. Apply convertion if matches.
     *
     * @return {Object} - Stream
     */
  }, {
    key: 'stream',
    value: function stream() {
      var self = this;

      return _through22['default'].obj(function (file, enc, cb) {
        var stream = this;

        if (!self.isTransformable(file)) {
          // Pass-through.
          return cb(null, file);
        }

        // Matches `from`, let's convert it.
        checkBinaryCache().then(function (res) {
          self.bundler = res ? res.bundler : false;

          return self.convertFile(file, enc);
        }).then(function (result) {
          file.contents = new Buffer(result.stdout);
          self.rename(file);

          cb(null, file);
        }, function (err) {
          stream.emit('error', err);

          if (self.options.force) {
            // Continue stream chain,
            // but don't pass unconverted chunks.
            return cb();
          }

          // Stop stream chain.
          stream.destroy();
          stream.emit('end');
        });
      });
    }
  }, {
    key: 'command',
    decorators: [_memoizeDecorator2['default']],
    get: function get() {
      var cmd = (this.bundler ? 'bundle exec ' : '') + 'sass-convert';

      // Add required args.
      var options = (0, _objectAssign2['default'])({}, this.options, {
        'stdin': true,
        'no-cache': true
      });

      // Filter unwanted or erroneous args.
      var includes = ['from', 'to', 'dasherize', 'indent', 'old', 'default-encoding', 'unix-newlines', 'stdin', 'no-cache'];

      var args = (0, _dargs2['default'])(options, { includes: includes });

      return { cmd: cmd, args: args };
    }
  }]);

  return Converter;
})();

module.exports = function (options) {
  return new Converter(options).stream();
};

// Expose custom error constructors.
module.exports.BinaryError = BinaryError;
module.exports.VersionError = VersionError;
