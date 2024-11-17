# unraid-storcli

## How to build unraid package example

```bash
mkdir -p ./artifacts/usr/local/bin/
cp storcli64 ./artifacts/usr/local/bin/

tar --owner=0 --group=0 -cvzf packages/storcli-2024.08.24.tgz --xform='s,./artifacts/,,' $(find ./artifacts/ -type f)
```

## Installation

Add the following URL to the Plugin Install URL field in the unRAID webui:

```
https://github.com/t3chguy/unraid-storcli/raw/main/plugin/storcli.plg
```