/**
 * Largely based on the charmap tinymce plugin
 *
 * charmap details:
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

(function() {
	
	tinymce.PluginManager.add('controllercons', function(editor) {
		var isArray = tinymce.util.Tools.isArray;

		function getControllercons() {
			return [
				['󌄀', 'atari2600', 'Atari 2600'],
				['󌄁', 'atari2600-o', 'Atari 2600 Outlined'],
				['󌄂', 'mastersystem', 'Master System'],
				['󌄃', 'mastersystem-o', 'Master System Outlined'],
				['󌀀', 'nes', 'NES'],
				['󌀁', 'nes-o', 'NES Outlined'],
				['󌀂', 'megadrive', 'SEGA Megadrive/Genesis'],
				['󌀃', 'megadrive-o', 'SEGA Megadrive/Genesis Outlined'],
				['󌀄', 'snes', 'SNES'],
				['󌀅', 'snes-o', 'SNES Outlined'],
				['󌀆', 'ps1', 'PlayStation'],
				['󌀇', 'ps1-o', 'PlayStation Outlined'],
				['󌄄', 'virtualboy', 'Virtualboy'],
				['󌄅', 'virtualboy-o', 'Virtualboy Outlined'],
				['󌀈', 'n64', 'N64'],
				['󌀉', 'n64-o', 'N64 Outlined'],
				['󌄆', 'dreamcast', 'Dreamcast'],
				['󌄇', 'n64-o', 'Dreamcast Outlined'],
				['󌀐', 'ps2', 'PlayStation 2'],
				['󌀑', 'ps2-o', 'PlayStation 2 Outlined'],
				['󌄈', 'xbox', 'Xbox'],
				['󌀓', 'xbox-o', 'Xbox Outlined'],
				['󌀒', 'xboxs', 'Xbox Slim'],
				['󌄉', 'xboxs-o', 'Xbox Slim Outlined'],
				['󌀔', 'gamecube', 'Gamecube'],
				['󌀕', 'gamecube-o', 'Gamecube Outlined'],
				['󌀖', 'xbox360', 'Xbox 360'],
				['󌀗', 'xbox360-o', 'Xbox 360 Outlined'],
				['󌀘', 'ps3', 'PlayStation 3'],
				['󌀙', 'ps3-o', 'PlayStation 3 Outlined'],
				['󌀠', 'wii', 'Wii Remote'],
				['󌀡', 'wii-o', 'Wii Remote Outlined'],
				['󌄐', 'wiiclassic', 'Wii Classic'],
				['󌄑', 'wiiclassic-o', 'Wii Classic Outlined'],
				['󌀢', 'wiiu', 'Wii U'],
				['󌀣', 'wiiu-o', 'Wii U Outlined'],
				['󌄒', 'wiiupro', 'Wii U Pro'],
				['󌄓', 'wiiupro-o', 'Wii U Pro Outlined'],
				['󌀤', 'ps4', 'PlayStation 4'],
				['󌀥', 'ps4-o', 'PlayStation 4 Outlined'],
				['󌀦', 'xboxone', 'Xbox One'],
				['󌀧', 'xboxone-o', 'Xbox One Outlined'],
				['󌀨', 'joyconl', 'Switch Joy Con (L)'],
				['󌀩', 'joyconl-o', 'Switch Joy Con (L) Outlined'],
				['󌀰', 'joyconr', 'Switch Joy Con (R)'],
				['󌀱', 'joyconr-o', 'Switch Joy Con (R) Outlined'],
				['󌄔', 'switchpro', 'Switch Pro'],
				['󌄕', 'switchpro-o', 'Switch Pro Outlined'],
			];
		}

		function insertControllercon(controller) {
			editor.insertContent('[controllercon id=\"' + controller + '\"]');
		}

		function showDialog() {
			var gridHtml, x, y, win;

			function getParentTd(elm) {
				while (elm) {
					if (elm.nodeName == 'TD') {
						return elm;
					}

					elm = elm.parentNode;
				}
			}

			gridHtml = '<table role="presentation" cellspacing="0" class="mce-controllercons"><tbody>';

			var charmap = getControllercons(),
				width = Math.min(charmap.length, 15),
				height = Math.ceil(charmap.length / width);
			for (y = 0; y < height; y++) {
				gridHtml += '<tr>';

				for (x = 0; x < width; x++) {
					var index = y * width + x;
					if (index < charmap.length) {
						var chr = charmap[index];

						gridHtml += '<td title="' + chr[2] + '"><div tabindex="-1" title="' + chr[2] + '" role="button" data-class="' + chr[1] + '" style="font-family: controllercons">' +
							(chr ? chr[0] : '&nbsp;') + '</div></td>';
					} else {
						gridHtml += '<td />';
					}
				}

				gridHtml += '</tr>';
			}

			gridHtml += '</tbody></table>';

			var charMapPanel = {
				type: 'container',
				html: gridHtml,
				onclick: function(e) {
					var target = e.target;

					if (/^(TD|DIV)$/.test(target.nodeName)) {
						if (getParentTd(target).firstChild) {
							insertControllercon(target.getAttribute('data-class'));

							if (!e.ctrlKey) {
								win.close();
							}
						}
					}
				},
				onmouseover: function(e) {
					var td = getParentTd(e.target);

					if (td && td.firstChild) {
						win.find('#preview').text(td.firstChild.firstChild.textContent);
						win.find('#previewTitle').text(td.title);
					} else {
						win.find('#preview').text(' ');
						win.find('#previewTitle').text(' ');
					}
				}
			};

			win = editor.windowManager.open({
				title: "Select controllercon",
				spacing: 10,
				padding: 10,
				items: [
					charMapPanel,
					{
						type: 'container',
						layout: 'flow',
						direction: 'column',
						align: 'center',
						spacing: 5,
						minWidth: 240,
						minHeight: 160,
						style: 'text-align: center',
						items: [
							{
								type: 'label',
								name: 'preview',
								text: ' ',
								style: 'display: block; font-family: controllercons; font-size: 60px; margin-bottom: 15px; margin-left: auto; margin-right: auto; text-align: center',
								border: 1,
								minWidth: 220,
								minHeight: 80
							},
							{
								type: 'label',
								name: 'previewTitle',
								text: ' ',
								style: 'display: block; margin-left: auto; margin-right: auto; text-align: center',
								border: 1,
								minWidth: 220,
								minHeight: 80
							}
						]
					}
				],
				buttons: [
					{text: "Close", onclick: function() {
						win.close();
					}}
				]
			});
		}
		
		editor.addCommand('mceShowControllercons', showDialog);
		
		editor.addButton('controllercons', {
			title: 'Controllercons',
			cmd: 'mceShowControllercons',
			image: 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHN0eWxlPi5he2ZpbGw6IzU1NUQ2Njt9PC9zdHlsZT48cGF0aCBkPSJNMjQxLjIgNzRjLTUuOS0xMi43LTE0LjQtMjIuNS0yNS40LTI5LjMgLTExLTYuOS0yMy44LTEwLjMtMzguMi0xMC4zIC0xOS41IDAtMzUuMiA1LjMtNDcgMTUuOCAtMS4zIDEuMi0zLjYgMy42LTUuNSA1LjYgLTEuOS0yLjEtNC4xLTQuNS01LjQtNS42QzEwNy42IDM5LjYgOTIgMzQuMyA3Mi41IDM0LjNjLTE0LjUgMC0yNy4yIDMuNC0zOC4zIDEwLjNDMjMuMiA1MS41IDE0LjcgNjEuMyA4LjggNzQgMi45IDg2LjYgMCAxMDEuMyAwIDExOHYxNi41YzAgMTYuMiAzLjMgMzAuNSA5LjEgNDIuOCA1LjggMTIuMyAxNC4xIDIxLjggMjQuOCAyOC40IDEwLjcgNi43IDIzLjEgMTAgMzcuMiAxMCAyMC4xIDAgMzYuMy01LjMgNDguNC0xNS44IDEuNy0xLjQgMy45LTMuOCA1LjYtNS43IDEuOCAyIDQuMSA0LjQgNS42IDUuNyAxMi4xIDEwLjYgMjguMiAxNS44IDQ4LjQgMTUuOCAxNC4xIDAgMjYuNS0zLjMgMzcuMi0xMCAxMC43LTYuNyAxOS0xNi4xIDI0LjgtMjguNEMyNDYuNyAxNjUgMjUwIDE1MC43IDI1MCAxMzQuNXYtMTYuNUMyNTAgMTAxLjMgMjQ3LjEgODYuNiAyNDEuMiA3NHpNMTQ2LjYgNzMuNmMxLjQtMi40IDMtNC40IDQuOC02LjEgNS45LTUuNiAxNC43LTguNCAyNi4xLTguNCAxMy4zIDAgMjcgNC45IDM0LjIgMTQuNiA3LjIgOS44IDExIDI0LjEgMTEgNDIuOXYxNS43YzAgMTkuMS0zLjQgMzMuNy0xMC4yIDQzLjcgLTYuOCAxMC0yMC4zIDE1LTMzLjQgMTUgLTEyIDAtMjEuMS0yLjctMjcuMi04LjEgLTYuMS01LjQtOS45LTE0LjQtMTEuNS0yN2wtMzAuNi0wLjFjMCAwLjEgMCAwLjEgMCAwLjIgLTEuNiAxMi42LTUuNSAyMS41LTExLjUgMjYuOSAtNi4xIDUuNC0xNS4xIDguMS0yNy4yIDguMSAtMTMuMiAwLTI2LjYtNS0zMy40LTE1IC02LjgtMTAtMTAuMi0yNC42LTEwLjItNDMuN3YtMTUuN2MwLTE4LjkgMy44LTMzLjEgMTEtNDIuOSA3LjItOS43IDIwLjgtMTQuNiAzNC4yLTE0LjYgMTEuNSAwIDIwLjIgMi44IDI2LjEgOC40IDEuOCAxLjcgMy40IDMuOCA0LjggNi4xTDE0Ni42IDczLjYgMTQ2LjYgNzMuNnoiIGNsYXNzPSJhIi8+PHBhdGggZD0iTTk0IDEyMS4zYzAtMS45LTEuNi0zLjQtMy40LTMuNGgtOS44Yy0xLjkgMC0zLjQtMS42LTMuNC0zLjR2LTkuOGMwLTEuOS0xLjYtMy40LTMuNC0zLjRINjYuNGMtMS45IDAtMy40IDEuNi0zLjQgMy40djkuOGMwIDEuOS0xLjYgMy40LTMuNCAzLjRoLTkuOGMtMS45IDAtMy40IDEuNi0zLjQgMy40djcuNWMwIDEuOSAxLjYgMy40IDMuNCAzLjRoOS44YzEuOSAwIDMuNCAxLjYgMy40IDMuNHY5LjhjMCAxLjkgMS42IDMuNCAzLjQgMy40aDcuNWMxLjkgMCAzLjQtMS42IDMuNC0zLjR2LTkuOGMwLTEuOSAxLjYtMy40IDMuNC0zLjRoOS44YzEuOSAwIDMuNC0xLjYgMy40LTMuNFYxMjEuM0w5NCAxMjEuM3oiIGNsYXNzPSJhIi8+PHBhdGggZD0iTTE3NC40IDEyNWMwIDYuMy01LjEgMTEuNC0xMS40IDExLjQgLTYuMyAwLTExLjQtNS4xLTExLjQtMTEuNCAwLTYuMyA1LjEtMTEuNCAxMS40LTExLjRDMTY5LjMgMTEzLjYgMTc0LjQgMTE4LjcgMTc0LjQgMTI1eiIgY2xhc3M9ImEiLz48cGF0aCBkPSJNMjA4LjEgMTI1YzAgNi4zLTUuMSAxMS40LTExLjQgMTEuNCAtNi4zIDAtMTEuNC01LjEtMTEuNC0xMS40IDAtNi4zIDUuMS0xMS40IDExLjQtMTEuNEMyMDMgMTEzLjYgMjA4LjEgMTE4LjcgMjA4LjEgMTI1eiIgY2xhc3M9ImEiLz48L3N2Zz4='
		});

		return {
			getControllercons: getControllercons,
			insertControllercon: insertControllercon
		}
	});
	
})();