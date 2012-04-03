<?php /*

[eZJSCore]
CssOptimizer[]
CssOptimizer[]=fepPhpYuiCssCompressorOptimizer

JavaScriptOptimizer[]
JavaScriptOptimizer[]=fepClosureJavaScriptOptimizer
#JavaScriptOptimizer[]=fepYuiCompressorJavaScriptOptimizer

[GoogleClosure]
Command=java -jar extension/frontendperformanceboost/bin/compiler.jar --compilation_level SIMPLE_OPTIMIZATIONS --summary_detail_level 3

[YuiCompressor]
Command=java -jar extension/frontendperformanceboost/bin/yuicompressor-2.4.7.jar --type js

*/ ?>
