--TEST--
MongoDB\Driver\Manager::executeReadCommand()
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; ?>
<?php NEEDS('STANDALONE'); CLEANUP(STANDALONE); ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE);

$command = new MongoDB\Driver\Command([]);

echo throws(function() use ($manager, $command) {
    $manager->executeReadCommand(
        DATABASE_NAME, $command,
        [
            'writeConcern' => new \MongoDB\Driver\ReadConcern(\MongoDB\Driver\WriteConcern::MAJORITY),
        ]
    );
}, 'MongoDB\Driver\Exception\InvalidArgumentException'), "\n";
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Unknown option 'writeConcern'
===DONE===
