!function(e){var t=echarts.init(document.getElementById("basic_filled_radar"));option={color:["#007bff","#ee3d50"],tooltip:{trigger:"axis"},legend:{x:"center",data:["Ronaldo","Shepchenko"]},calculable:!0,polar:[{indicator:[{text:"attack",max:100},{text:"Defensive",max:100},{text:"Fitness",max:100},{text:"speed",max:100},{text:"power",max:100},{text:"skill",max:100}],radius:130}],series:[{name:"Full live player data",type:"radar",itemStyle:{normal:{areaStyle:{type:"default"}}},data:[{value:[97,42,88,94,90,86],name:"Shepchenko"},{value:[97,32,74,95,88,92],name:"Ronaldo"}]}]},t.setOption(option),e(window).on("resize",function(){null!=t&&null!=t&&t.resize()});var a=echarts.init(document.getElementById("basic_radar"));option={tooltip:{trigger:"axis"},color:["#3862f5","#00d1c1"],legend:{orient:"vertical",x:"left",data:["Budget allocation","Actual expenses"]},polar:[{indicator:[{text:"Research",max:6e3},{text:"Admin",max:16e3},{text:"IT",max:3e4},{text:"Customer service",max:38e3},{text:"Sales",max:52e3},{text:"Market",max:25e3}]}],calculable:!0,series:[{name:"Budget vs Overhead",type:"radar",data:[{value:[4300,1e4,28e3,35e3,5e4,19e3],name:"Budget allocation"},{value:[5e3,14e3,28e3,31e3,42e3,21e3],name:"Actual expenses"}]}]},a.setOption(option),e(window).on("resize",function(){null!=a&&null!=a&&a.resize()})}(jQuery);