<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\NoteList;

class NoteListTest extends TestCase
{
    public function testGetNotes()
    {
        $this->client->addResponse('GET', '/accounts/abcdef1234567890/notes', 'notes/index-200.xml');

        $notes = NoteList::get('abcdef1234567890', $this->client);
        $this->assertInstanceOf('Recurly\NoteList', $notes);
        $this->assertEquals($notes->count(), 2);

        $note = $notes->current();

        $this->assertInstanceOf('Recurly\Note', $note);
        $this->assertEquals($note->message, 'this account needs an account manager');
        $this->assertEquals($note->created_at->format(\DateTime::ISO8601), '2013-03-12T18:35:00+0000');

        $notes->next();

        $note = $notes->current();
        $this->assertInstanceOf('Recurly\Note', $note);
        $this->assertEquals($note->message, 'Some message');
        $this->assertEquals($note->created_at->format(\DateTime::ISO8601), '2012-04-30T12:35:00+0000');
    }
}
