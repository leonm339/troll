hello
print
git init
git remote add me
git remote add crash-course-remote
Leon@Leon MINGW64 /c/wamp/www/troll (master)
$ git init
Reinitialized existing Git repository in C:/wamp/www/troll/.git/
Leon@Leon MINGW64 /c/wamp/www/troll (master)
$ git remote add me
usage: git remote add [<options>] <name> <url>
    -f, --fetch           fetch the remote branches
    --tags                import all tags and associated objects when fetching
                          or do not fetch any tag at all (--no-tags)
    -t, --track <branch>  branch(es) to track
    -m, --master <branch>
                          master branch
    --mirror[=<push|fetch>]
                          set up remote as a mirror to push to or fetch from
Leon@Leon MINGW64 /c/wamp/www/troll (master)
$ git remote add crash-course-remote
usage: git remote add [<options>] <name> <url>
    -f, --fetch           fetch the remote branches
    --tags                import all tags and associated objects when fetching
                          or do not fetch any tag at all (--no-tags)
    -t, --track <branch>  branch(es) to track
    -m, --master <branch>
                          master branch
    --mirror[=<push|fetch>]
                          set up remote as a mirror to push to or fetch from
Leon@Leon MINGW64 /c/wamp/www/troll (master)
$
git remote add origin https://github.com/leonm339/troll.git
git push -u origin master
