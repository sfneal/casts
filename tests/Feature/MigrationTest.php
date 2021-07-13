<?php

namespace Sfneal\Casts\Tests\Feature;

use Carbon\Carbon;
use Sfneal\Casts\Tests\Models\People;
use Sfneal\Casts\Tests\TestCase;

class MigrationTest extends TestCase
{
    public static function getBio(): string
    {
        return "
            When a suburban Boston couple decided to tear down their existing home and build a replacement on the same
            site, they chose a classic gambrel-roofed, Shingle-style design that fit seamlessly into the neighborhood,
            and filled the interior with classically New England architectural touches like coffered ceilings,
            decorative molding, and a centerpiece gallery with an arched ceiling.
            \nThen the owners, who have roots in sunny California, asked interior designer Jill Goldberg to wind the
            clock forward again, filling the home with furnishings, lighting, and window and wall treatments that added
            a mix of contemporary and midcentury style and color.
        ";
    }

    /** @test */
    public function it_can_access_the_database()
    {
        // Save a new Address
        $person = new People();
        $person->name_first = 'Johnny';
        $person->name_last = 'Tsunami';
        $person->email = 'johnny.tsunami@example.com';
        $person->birthday = \DateTime::createFromFormat('m-d-Y', '11-27-1995');
        $person->bio = self::getBio();
        $person->favorites = [1, 2, 3];
        $person->save();

        // Retrieve the new Address
        $newPerson = People::query()->find($person->person_id);

        // Assert Jokes are the same
        $this->assertSame($newPerson->name_first, 'Johnny');
        $this->assertSame($newPerson->name_last, 'Tsunami');
        $this->assertSame($newPerson->email, 'johnny.tsunami@example.com');
        $this->assertEquals($newPerson->birthday, (new Carbon(\DateTime::createFromFormat('m-d-Y', '11-27-1995'))));
        $this->assertSame($newPerson->bio, nl2br(self::getBio()));
        $this->assertSame($newPerson->favorites, [1, 2, 3]);
    }
}
