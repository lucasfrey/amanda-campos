var webpack = require('webpack/lib/webpack');
var path = require('path');
var nodeModulesDir = path.resolve(__dirname, 'node_modules');

module.exports = {
	cache: true,
	context: __dirname,
	entry: [
		'./js/index.js'
	],
	output: {
		path: path.resolve('js/'),
		filename: 'bundle-[name].js',
		sourceMapFilename: '[file].map'
	},
	module: {
		loaders: [
			{
				test: /\.js$|\.json$|\.jsx$/,
				loaders: ['babel-loader?loose=all&optional=runtime&stage=1'],
				exclude: [nodeModulesDir]
			}
		]
	},
	plugins: [
		new webpack.NoErrorsPlugin()
	],
	resolve: {
		modulesDirectories: ['vendor', 'node_modules']
	}
};