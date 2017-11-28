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
				['cc-nes', 'NES'],
				['cc-nes-o', 'NES Outlined'],
				['cc-megadrive', 'SEGA Megadrive/Genesis'],
				['cc-megadrive-o', 'SEGA Megadrive/Genesis Outlined'],
				['cc-snes', 'SNES'],
				['cc-snes-o', 'SNES Outlined'],
				['cc-ps1', 'PlayStation'],
				['cc-ps1-o', 'PlayStation Outlined'],
				['cc-n64', 'N64'],
				['cc-n64-o', 'N64 Outlined'],
				['cc-ps2', 'PlayStation 2'],
				['cc-ps2-o', 'PlayStation 2 Outlined'],
				['cc-xbox', 'Xbox'],
				['cc-xbox-o', 'Xbox Outlined'],
				['cc-gamecube', 'Gamecube'],
				['cc-gamecube-o', 'Gamecube Outlined'],
				['cc-xbox360', 'Xbox 360'],
				['cc-xbox360-o', 'Xbox 360 Outlined'],
				['cc-ps3', 'PlayStation 3'],
				['cc-ps3-o', 'PlayStation 3 Outlined'],
				['cc-wii-remote', 'Wii Remote'],
				['cc-wii-remote-o', 'Wii Remote Outlined'],
				['cc-wiiu', 'Wii U'],
				['cc-wiiu-o', 'Wii U Outlined'],
				['cc-ps4', 'PlayStation 4'],
				['cc-ps4-o', 'PlayStation 4 Outlined'],
				['cc-xboxone', 'Xbox One'],
				['cc-xboxone-o', 'Xbox One Outlined'],
				['cc-switch-joycon-l', 'Switch Joy Con (L)'],
				['cc-switch-joycon-l-o', 'Switch Joy Con (L) Outlined'],
				['cc-switch-joycon-r', 'Switch Joy Con (R)'],
				['cc-switch-joycon-r-o', 'Switch Joy Con (R) Outlined'],
				['cc-switch', 'Switch'],
				['cc-switch-o', 'Switch Outlined'],
			];
		}

		function insertControllercon(controller) {
			editor.insertContent('<i class="cc ' + controller + '"></i>');
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

						gridHtml += '<td title="' + chr[1] + '"><div tabindex="-1" title="' + chr[1] + '" role="button">' +
							(chr ? '<i class="cc ' + chr[0] + '"></i>' : '&nbsp;') + '</div></td>';
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
							insertControllercon(target.innerText);

							if (!e.ctrlKey) {
								win.close();
							}
						}
					}
				},
				onmouseover: function(e) {
					var td = getParentTd(e.target);

					if (td && td.firstChild) {
						win.find('#preview').text('td.firstChild.firstChild');
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
						layout: 'flex',
						direction: 'column',
						align: 'center',
						spacing: 5,
						minWidth: 240,
						minHeight: 160,
						items: [
							{
								type: 'label',
								name: 'preview',
								text: ' ',
								style: 'font-size: 40px; text-align: center',
								border: 1,
								minWidth: 220,
								minHeight: 80
							},
							{
								type: 'label',
								name: 'previewTitle',
								text: ' ',
								style: 'text-align: center',
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