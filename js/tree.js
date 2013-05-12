$(document).ready(function() {
	var settings = {
		view: {
			selectedMulti: false
		},
		edit: {
			enable: true,
			showRemoveBtn: false,
			showRenameBtn: false
		},
		data: {
			simpleData: {
				enable: true
			},
			keep: {
				leaf: true,
				parent: true
			}
		},
		callback: {
			onDrop: zTreeOnDrop
		}
	};

	if (typeof $.globals.nodes == 'undefined') {
		var zNodes = [
			{name : "A"},
			{name : "B"},
			{name : "C"},
			{name : "D"},
			{name : "E"},
			{name : "F"}
		];
	} else {
		var zNodes = $.globals.nodes;
	}

	$.fn.zTree.init($("#tree"), settings, zNodes);

	$("#btnAddGroup").bind("click", {isParent:true}, addGroup);
	$("#btnDelete").bind("click", delGroup);
	$("#btnExpandAll").bind("click", expandAll);
	$("#btnCollapseAll").bind("click", collapseAll);
});

function zTreeOnDrop() {
	$.globals.drops++;
}

var newCount = 0;
function addGroup(e) {
	var zTree = $.fn.zTree.getZTreeObj("tree"),
	isParent = e.data.isParent,
	nodes = zTree.getSelectedNodes(),
	treeNode = nodes[0];
	treeNode = zTree.addNodes(null, {id:(100 + newCount), pId:0, isParent:isParent, name:"Group"});

	if (!treeNode) {
		alert("Leaf node is locked and can not add child node.");
	}
}

function delGroup(e) {
	var zTree = $.fn.zTree.getZTreeObj("tree"),
	nodes = zTree.getSelectedNodes(),
	treeNode = nodes[0];

	if (nodes.length == 0) {
		alert("Please select one node first...");
		return;
	}

	if (!treeNode.isParent) {
		alert("You can only remove folders.");
		return;
	}

	if (treeNode.children.length > 0) {
		for (var i = 0; i < treeNode.children.length; i++) {
			if (!treeNode.children[i].isParent) {
				alert("You can't delete a folder with nodes in it.");
				return;
			}
		}
	}

	zTree.removeNode(treeNode, false);
}

function expandAll() {
	var zTree = $.fn.zTree.getZTreeObj("tree");

	zTree.expandAll(true);
}

function collapseAll() {
	var zTree = $.fn.zTree.getZTreeObj("tree");

	zTree.expandAll(false);
}